<?php


namespace App\Controller\user;


use App\Entity\Manga;
use App\Entity\Utilisateur;
use App\Form\manga\MangaType;
use App\Repository\MangaRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersMangaController extends AbstractController
{
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * @var MangaRepository
     */
    private $mangaRepository;

    /**
     * UsersMangaController constructor.
     * @param ObjectManager $manager
     * @param MangaRepository $mangaRepository
     */
    public function __construct(ObjectManager $manager, MangaRepository $mangaRepository)
    {
        $this->manager = $manager;
        $this->mangaRepository = $mangaRepository;
    }

    /**
     * @Route("/{id}/indexManga", name="usersManga.index", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Utilisateur $utilisateur, Request $request, PaginatorInterface $paginator): Response
    {
        $mangaPage = $paginator->paginate(
            $utilisateur->getUtiManga(),
            $request->query->getInt('page', 1),
            20
        );
        return $this->render('users/users_show/users_show_creations/users_show_manga.html.twig',[
            'current_page' => 'index',
            'user' => $utilisateur,
            'allManga'=>$mangaPage
        ]);
    }

    /**
     * @Route("/{id}/addManga", name="usersManga.addManga", methods="GET|POST")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @return Response
     */
    public function addManga(Request $request, Utilisateur $utilisateur) : Response
    {
        $manga = new Manga();
        $form = $this->createForm(MangaType::class,$manga);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $manga->addUtilisateurs($utilisateur);
                $this->addFlash('notif', 'Manga créé avec succès !');
                $this->manager->persist($manga);
                $this->manager->flush();
               // return $this->redirectToRoute("usersManga.index",['utilisateur'=>$utilisateur->getId()]); TODO fix
            } else
            {
                $this->addFlash('notif', 'Impossible de créer le manga.');
                //return $this->redirectToRoute("usersManga.index",['utilisateur'=>$utilisateur->getId()]); TODO fix
            }
        }
        return $this->render('users/users_show/users_show_creations/users_show_manga_addform.html.twig',[
            'current_page' => 'addManga',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route ("/deleteManga/{utilisateur}/{manga}", name="usersManga.deleteManga", methods="DELETE")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @param Manga $manga
     * @return Response
     */
    public function deleteManga(Request $request, Utilisateur $utilisateur, Manga $manga) : Response
    {
        if ($this->isCsrfTokenValid('delete' . $manga->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($manga);
            $entityManager->flush();
            $this->addFlash('notif', 'Manga supprimé avec succès !');
        }

        return $this->redirectToRoute('usersManga.index',["id"=>$utilisateur->getId()]);
    }
}