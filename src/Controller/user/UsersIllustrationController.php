<?php


namespace App\Controller\user;


use App\Entity\Illustration;
use App\Entity\Utilisateur;
use App\Form\Illustration\IllustrationType;
use App\Repository\IllustrationRepository;
use App\Repository\ImageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersIllustrationController extends AbstractController
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var IllustrationRepository
     */
    private $illustrationRepository;

    /**
     * @var IllustrationRepository
     */
    private $imageRepository;

    public function __construct(ObjectManager $manager, IllustrationRepository $illustrationRepository, ImageRepository $imageRepository)
    {
        $this->manager = $manager;
        $this->illustrationRepository = $illustrationRepository;
        $this->imageRepository= $illustrationRepository;
    }

    /**
     * @Route("/{id}/indexIllustration", name="usersIllustration.index", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function index(Utilisateur $utilisateur, PaginatorInterface $paginator, Request $request): Response
    {
        $illustrationPage  = $paginator->paginate(
            $utilisateur->getUtiIllustration(),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('users/users_show/users_show_creations/users_show_illustration.html.twig',[
            'current_page' => 'index',
            'allIllustration'=> $illustrationPage,
            'user' => $utilisateur
        ]);
    }

    /**
     * @Route("/{id}/addIllustration", name="users.addIllustration", methods="GET|POST")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @return Response
     */
    public function addIllustration(Request $request, Utilisateur $utilisateur) : Response
    {
        $illustration = new Illustration();
        $form = $this->createForm(IllustrationType::class,$illustration);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $illustration->addUtilisateur($utilisateur);
                $this->addFlash('notif', 'illustration créé avec succès !');
                $this->manager->persist($illustration);
                $this->manager->flush();
                return $this->redirectToRoute("usersIllustration.index",['id'=>$utilisateur->getId()]);
            }
            else
            {
                $this->addFlash('notif', 'Impossible de créer l\'$illustration.');
                return $this->redirectToRoute("usersIllustration.index",['utilisateur'=>$utilisateur->getId()]);
            }
        }
        return $this->render('users/users_show/users_show_creations/users_show_illustration_addform.html.twig',[
            'current_page' => 'illustration_add',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/editIllustration/{utilisateur}/{illustration}", name="users.editIllustration", methods="GET|POST")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @param Illustration $illustration
     * @return Response
     */
    public function editIllustration(Request $request, Utilisateur $utilisateur, Illustration $illustration): Response
    {
        $form = $this->createForm(IllustrationType::class,$illustration);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->addFlash('notif', 'illustration créé avec succès !');
                $this->manager->flush();
                return $this->redirectToRoute("usersIllustration.index",['id'=>$utilisateur->getId()]);
            }
            else
            {
                $this->addFlash('notif', 'Impossible de créer l\'$illustration.');
                return $this->redirectToRoute("usersIllustration.index",['utilisateur'=>$utilisateur->getId()]);
            }
        }
        return $this->render('users/users_show/users_show_creations/users_show_illustration_editform.html.twig',[
            'current_page' => 'illustration_edit',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/deleteIllustration/{utilisateur}/{illustration}", name="users.deleteIllustration", methods="DELETE")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @param Illustration $illustration
     * @return Response
     */
    public function deleteIllustration(Request $request, Utilisateur $utilisateur, Illustration $illustration): Response
    {
        if ($this->isCsrfTokenValid('delete' . $illustration->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($illustration);
            $entityManager->flush();
            $this->addFlash('notif', 'Illustration supprimé avec succès !');
        }

        return $this->redirectToRoute('usersIllustration.index',["id"=>$utilisateur->getId()]);
    }

}