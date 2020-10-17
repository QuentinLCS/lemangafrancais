<?php


namespace App\Controller\admin;


use App\Entity\Utilisateur;
use App\Entity\UtilisateurSearch;
use App\Form\admin\AdminUtilisateurEditType;
use App\Form\security\SecurityUtilisateurSignupType;
use App\Form\Utilisateur\UtilisateurSearchType;
use App\Repository\RoleRepository;
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
 * @Route("/{_locale}/admin/users")
 */
class AdminUsersController extends AbstractController
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
     * AdminUsersController constructor.
     * @param UtilisateurRepository $repository
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     * @param RoleRepository $roleRepository
     */
    public function __construct(UtilisateurRepository $repository, ObjectManager $manager, UserPasswordEncoderInterface $encoder, RoleRepository $roleRepository)
    {
        $this->repository = $repository;
        $this->manager = $manager;
        $this->encoder = $encoder;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @Route("", name="admin.users.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return bool|Response
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
        $search = new UtilisateurSearch();
        $searchForm = $this->createForm(UtilisateurSearchType::class, $search);
        $searchForm->handleRequest($request);

        $form = $this->new($request);

        if ($form->isSubmitted() && $form->isValid())
            return $this->redirect($request->getUri());

        $utilisateursPage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('admin/admin_users/admin_users_index.html.twig', [
            'current_page' => 'admin_users',
            'pageUsers' => $utilisateursPage,
            'allUsers' => $this->repository->findAll(),
            'addForm' => $form->createView(),
            'searchForm' => $searchForm->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="admin.users.show", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @return Response
     */
    public function show(Utilisateur $utilisateur, Request $request): Response
    {

        $form = $this->edit($request, $utilisateur);

        if ($form->isSubmitted() && $form->isValid())
            return $this->redirect($request->getUri());

        return $this->render('admin/admin_users/admin_users_show/admin_users_show_index.html.twig', [
            'current_page' => 'admin_users',
            'user' => $utilisateur,
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @return FormInterface
     */
    private function edit(Request $request, Utilisateur $utilisateur)
    {
        $form = $this->createForm(AdminUtilisateurEditType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $passwordField = $form->get('utiMdp');
                if (!$passwordField->isEmpty())
                    $utilisateur->setUtiMdp($this->encoder->encodePassword($utilisateur, $passwordField->getData()));
                $this->manager->persist($utilisateur);
                $this->manager->flush();
                $this->addFlash('notif', 'Utilisateur modifié avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de modifier cet utilisateur.');
        }
        return $form;
    }

    /**
     * @param Request $request
     * @return FormInterface
     */
    private function new(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(SecurityUtilisateurSignupType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $utilisateur->setUtiMdp($this->encoder->encodePassword($utilisateur, $form->get('utiMdp')->getData()));
                $utilisateur->addUtiRole($this->roleRepository->find('1'));
                $this->manager->persist($utilisateur);
                $this->manager->flush();
                $this->addFlash('notif', 'Utilisateur créé avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de créer cet utilisateur.');
        }
        return $form;
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