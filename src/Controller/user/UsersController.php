<?php


namespace App\Controller\user;


use App\Entity\Manga;
use App\Entity\Scenario;
use App\Entity\ScenarioSearch;
use App\Entity\Utilisateur;
use App\Entity\UtilisateurSearch;
use App\Form\manga\MangaType;
use App\Form\Scenario\ScenarioSearchType;
use App\Form\Scenario\ScenarioType;
use App\Form\Utilisateur\UtilisateurEditType;
use App\Form\Utilisateur\UtilisateurSearchType;
use App\Repository\RoleRepository;
use App\Repository\ScenarioRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class AdminUsersController
 * @package App\Controller
 * @Route("/{_locale}/users")
 */
class UsersController extends AbstractController
{

    /**
     * @var UtilisateurRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $manager;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;
    /**
     * @var RoleRepository
     */
    private $roleRepository;
    /**
     * @var ScenarioRepository
     */
    private $scenarioRepository;

    /**
     * AdminUsersController constructor.
     * @param UtilisateurRepository $repository
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     * @param RoleRepository $roleRepository
     * @param ScenarioRepository $scenarioRepository
     */
    public function __construct(UtilisateurRepository $repository, ObjectManager $manager, UserPasswordEncoderInterface $encoder, RoleRepository $roleRepository,ScenarioRepository $scenarioRepository)
    {
        $this->repository = $repository;
        $this->manager = $manager;
        $this->encoder = $encoder;
        $this->roleRepository = $roleRepository;
        $this->scenarioRepository = $scenarioRepository;
    }

    /**
     * @Route("", name="users.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return bool|Response
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $search = new UtilisateurSearch();
        $searchForm = $this->createForm(UtilisateurSearchType::class, $search);
        $searchForm->handleRequest($request);

        $utilisateursPage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            20
        );

        $utilisateursAll = $this->repository->findAll();

        return $this->render('users/users_index.html.twig', [
            'current_page' => 'profile',
            'pageUsers' => $utilisateursPage,
            'allUsers' => $utilisateursAll,
            'searchForm' => $searchForm->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="users.show", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @return Response
     */
    public function show(Utilisateur $utilisateur, Request $request): Response
    {

        $form = $this->edit($request, $utilisateur);

        if ($form->isSubmitted() && $form->isValid())
            return $this->redirect($request->getUri());

        return $this->render('users/users_show/users_show_index.html.twig', [
            'current_page' => 'profile',
            'user' => $utilisateur,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}/show_manga", name="users.show_manga", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function show_manga(Utilisateur $utilisateur, Request $request, PaginatorInterface $paginator): Response
    {
        $mangaPage = $utilisateur->getUtiManga();
        return $this->render('users/users_show/users_show_creations/users_show_manga.html.twig',[
           'current_page' => 'profile',
           'user' => $utilisateur,
           'allManga'=>$mangaPage
        ]);
    }

    /**
     * @Route("/{id}/show_scenario", name="users.show_scenario", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @return Response
     */
    public function show_scenario(Utilisateur $utilisateur, PaginatorInterface $paginator, Request $request): Response
    {
        $scenarioPage=$utilisateur->getUtiScenario();
        $search = new ScenarioSearch();
        $searchForm = $this->createForm(ScenarioSearchType::class,$search);
        $searchForm->handleRequest($request);

        $ScenarioPage = $paginator->paginate(
            $this->scenarioRepository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            2
        );
        return $this->render('users/users_show/users_show_creations/users_show_scenario.html.twig',[
            'current_page' => 'show_scenario',
            'allScenario' => $ScenarioPage,
            'user' => $utilisateur,
            'searchForm'=>$searchForm->createView()
        ]);
    }
    /**
     * @Route("/{id}/show_illustration", name="users.show_illustration", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @return Response
     */
    public function show_illustration(Utilisateur $utilisateur): Response
    {
        $illustrationPage = $utilisateur->getUtiIllustration();
        return $this->render('users/users_show/users_show_creations/users_show_illustration.html.twig',[
            'current_page' => 'profile',
            'allIllustration'=> $illustrationPage,
            'user' => $utilisateur
        ]);
    }
    /**
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @return FormInterface
     */
    private function edit(Request $request, Utilisateur $utilisateur)
    {
        $form = $this->createForm(UtilisateurEditType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $passwordField = $form->get('utiMdp');
                if (!$passwordField->isEmpty())
                    $utilisateur->setUtiMdp($this->encoder->encodePassword($utilisateur, $passwordField->getData()));

                $this->manager->flush();
                $this->addFlash('notif', 'Utilisateur modifié avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de modifier cet utilisateur.');
        }
        return $form;
    }

    /**
 * @Route("/{id}/addManga", name="users.addManga", methods="GET|POST")
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
            } else
                $this->addFlash('notif', 'Impossible de créer le manga.');
        }
        return $this->render('users/users_show/users_show_creations/users_show_manga_addform.html.twig',[
            'current_page' => 'profile', // à changer ?
            'form' => $form->createView()
        ]);
    }
    /**
     * @Route("/{id}/addScenario", name="users.addScenario", methods="GET|POST")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @return Response
     */
    public function addScenario(Request $request, Utilisateur $utilisateur) : Response
    {
        $scenario = new Scenario();
        $form = $this->createForm(ScenarioType::class,$scenario);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $scenario->addUtilisateurs($utilisateur);
                $this->addFlash('notif', 'Scenario créé avec succès !');
                $this->manager->persist($scenario);
                $this->manager->flush();
            } else
                $this->addFlash('notif', 'Impossible de créer le scenario.');
        }
        return $this->render('users/users_show/users_show_creations/users_show_scenario_addform.html.twig',[
            'current_page' => 'profile', // à changer ?
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="admin.users.delete", methods="DELETE")
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @return Response
     */
    public function delete(Utilisateur $utilisateur, Request $request)
    {
        if ($this->isCsrfTokenValid(sprintf("delete%s", $utilisateur->getId()), $request->get('_token'))) {
            $this->manager->remove($utilisateur);
            $this->manager->flush();
            $this->addFlash('notif', 'Utilisateur supprimé avec succès !');
        }
        return $this->redirectToRoute('admin.users.index');
    }
}