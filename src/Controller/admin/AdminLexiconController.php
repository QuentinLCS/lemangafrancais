<?php


namespace App\Controller\admin;


use App\Entity\Lexique;
use App\Entity\LexiqueSearch;
use App\Form\admin\AdminLexiconType;
use App\Form\Lexicon\LexiqueSearchType;
use App\Repository\LexiqueRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use MongoDB\Driver\Manager;
use ProxyManager\ProxyGenerator\Util\Properties;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\ExpressionLanguage\Tests\Node\Obj;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminLexiconController
 * @package App\Controller
 * @Route("/{_locale}/admin/lexicon")
 */
class AdminLexiconController extends AbstractController
{
    private $repository;
    private $manager;
    public function __construct(LexiqueRepository $Repository, ObjectManager $manager)
    {
        $this->repository= $Repository;
        $this->manager = $manager;
    }
    /**
     * @Route("", name="admin.lexicon.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $search = new LexiqueSearch();
        $searchForm = $this->createForm(LexiqueSearchType::class,$search);
        $searchForm->handleRequest($request);
        $form = $this->add($request);
        if ($form->isSubmitted() && $form->isValid())
            return $this->redirect($request->getUri());
        $lexiquePage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('admin/admin_lexicon/admin_lexicon_index.html.twig', [
            'current_page' => 'admin_lexicon',
            'pageLexicons' => $lexiquePage,
            'form' => $form->createView(),
            'searchForm' => $searchForm->createView()
        ]);
    }
    /**
     * @Route("/{id}", name="admin.lexicon.delete", methods={"DELETE"})
     * @param Request $request
     * @param Lexique $lexique
     * @return Response
     */
    public function delete(Request $request, Lexique $lexique): Response
    {
        if ($this->isCsrfTokenValid('delete' . $lexique->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($lexique);
            $entityManager->flush();
            $this->addFlash('notif', 'Mot supprimé avec succès !');
        }

        return $this->redirectToRoute('admin.lexicon.index');
    }

    /**
     * @Route("/{id}", name="admin.lexicon.show", methods={"GET|POST"})
     * @param Lexique $lexique
     * @param Request $request
     * @return Response
     */
    public function show(Lexique $lexique, Request $request): Response
    {
        $form = $this->createForm(AdminLexiconType::class, $lexique);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $this->manager->flush();
            return $this->redirectToRoute('admin.lexicon.index');
        }
        return $this->render('admin/admin_lexicon/admin_lexicon_editform.html.twig', [
            'current_page' => 'admin_lexicon',
            'word' => $lexique,
            'form' => $form->createView()
        ]);
    }
    /**
     * @param Request $request
     * @return FormInterface
     */
    public function add(Request $request)
    {
        $mot = new Lexique();
        $form = $this->createForm(AdminLexiconType::class, $mot);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->manager->persist($mot);
                $this->manager->flush();
                $this->addFlash('notif', 'Mot créé avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de créer ce mot.');
        }
        return $form;
    }

}