<?php


namespace App\Controller\admin;




use App\Entity\News;
use App\Entity\NewsSearch;
use App\Entity\Utilisateur;
use App\Form\admin\AdminNewsEditType;
use App\Repository\NewsRepository;
use DateTimeZone;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminNewsController
 * @package App\Controller
 * @Route("/{_locale}/admin/news")
 */
class AdminNewsController extends AbstractController
{

    private $repository;
    /**
     * @var ObjectManager
     */
    private $om;

    public function __construct(NewsRepository $Repository, ObjectManager $om)
    {
        $this->om = $om;
        $this->repository= $Repository;
    }

    /**
     * @Route("", name="admin.news.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $search = new NewsSearch(); //faire un form pour rechercher

        $news=$this->repository->findAll();
        $newsPage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            30
        );


        return $this->render('admin/admin_news/admin_news_index.html.twig', [
            'current_page' => 'admin_news',
            'allNews' => $news,
            'pageNews' => $newsPage

        ]);
    }

    /**
     * @Route("/edit-{id}", name="admin.news.show", methods="GET|POST", requirements={"id": "[edit\-0-9]*"})
     * @param News $news
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function show(News $news, Request  $request): Response
    {
        $form = $this->createForm(AdminNewsEditType::class, $news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $news->setNewsDateDerniereModif(new \DateTime('now',new DateTimeZone('Europe/Paris')));
            $this->om->flush();
            $this->addFlash('notif', 'News modifiée avec succès !');
            return $this->redirectToRoute('admin.news.index');
        }

        return $this->render('admin/admin_news/admin_news_show.html.twig', [
            'current_page' => 'admin_news',
            'news' => $news,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="admin.news.new")
     * @return Response
     */
    public function new(Request $request) : Response
    {
        $news = new News();
        $news->addUtilisateur($this->getUser());

        $form = $this->createForm(AdminNewsEditType::class, $news);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $this->om->persist($news);
            $this->om->flush();
            $this->addFlash('notif', 'News créée avec succès !');
            return $this->redirectToRoute('admin.news.index');
        }
        else {
            dump($news);
            dump($form->getErrors());
        }



        return $this->render('admin/admin_news/admin_news_new.html.twig', [
            'current_page' => 'admin_news',
            'form'=> $form->createView(),
            'news'=> $news
        ]);
    }

    /**
     * @Route("/{id}", name="admin.news.delete", methods="DELETE")
     * @param News $news
     * @param Request $request
     * @return Response
     */
    public function delete(News $news, Request $request)
    {
        if($this->isCsrfTokenValid('delete'.$news->getId(),$request->get('_token'))){
            $this->om->remove($news);
            $this->om->flush();
            $this->addFlash('notif', 'News supprimé avec succès !');
        }


        return $this->redirectToRoute('admin.news.index');
    }
}