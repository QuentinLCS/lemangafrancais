<?php


namespace App\Controller\admin;

use App\Entity\Role;
use App\Entity\RoleSearch;
use App\Form\admin\AdminRoleEditPermissionsType;
use App\Form\admin\AdminRoleEditType;
use App\Form\Role\RoleSearchType;
use App\Repository\PermissionRepository;
use App\Repository\RoleRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminRolesController
 * @package App\Controller
 * @Route("/{_locale}/admin/ranks")
 */
class AdminRolesController extends AbstractController
{
    /**
     * @var RoleRepository|PermissionRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * AdminRolesController constructor.
     * @param RoleRepository $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param ObjectManager $manager
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository, ObjectManager $manager)
    {
        $this->repository = ["role" => $roleRepository, "permission" => $permissionRepository];
        $this->manager = $manager;
    }

    /**
     * @Route("", name="admin.roles.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return bool|Response
     */
    public function index(Request $request, PaginatorInterface $paginator): Response
    {

        $search = new RoleSearch();
        $searchForm = $this->createForm(RoleSearchType::class, $search);
        $searchForm->handleRequest($request);
        $form = $this->new($request);

        if (($form->isSubmitted() && $form->isValid()))
            return $this->redirect($request->getUri());

        $rolesPage = $paginator->paginate(
            $this->repository["role"]->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            20
        );

        $rolesAll = $this->repository["role"]->findAll();

        return $this->render('admin/admin_roles/admin_roles_index.html.twig', [
            'current_page' => 'admin_roles',
            'pageRanks' => $rolesPage,
            'allRanks' => $rolesAll,
            'form' => $form->createView(),
            'searchForm' => $searchForm->createView()
        ]);
    }

    /**
     * @Route("/{slug}-{id}", name="admin.roles.show", methods="GET|POST", requirements={"slug": "[a-z0-9\-]*"})
     * @param Role $role
     * @param Request $request
     * @param string $slug
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function show(Role $role, Request $request, string $slug, PaginatorInterface $paginator): Response
    {
        if ($role->getSlug() !== $slug)
            return $this->redirectToRoute('admin.roles.show', [
                'id' => $role->getId(),
                'slug' => $role->getSlug()
            ], 301);

        $editForm = $this->edit($request, $role);

        if ($editForm->isSubmitted() && $editForm->isValid())
            return $this->redirectToRoute('admin.roles.show', [
                'id' => $role->getId(),
                'slug' => $role->getSlug()
            ], 301);

        $permissionsForm = $this->edit($request, $role, true);

        $permissionPage = $paginator->paginate(
            $this->repository["permission"]->findAll(),
            $request->query->getInt('page', 1),
            20
        );

        return $this->render('admin/admin_roles/admin_roles_show/admin_roles_show_index.html.twig', [
            'current_page' => 'admin_roles',
            'rank' => $role,
            'pagePermissions' => $permissionPage,
            'form' => $editForm->createView(),
            'permissionsForm' => $permissionsForm->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return FormInterface
     */
    private function new(Request $request)
    {
        $role = new Role();
        $form = $this->createForm(AdminRoleEditType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->manager->persist($role);
                $this->manager->flush();
                $this->addFlash('notif', 'Rôle créé avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de créer ce rôle.');
        }

        return $form;
    }

    /**
     * @param Request $request
     * @param Role $role
     * @param bool $isPermission
     * @return FormInterface
     */
    public function edit(Request $request, Role $role, bool $isPermission = false)
    {
        $form = $this->createForm($isPermission ? AdminRoleEditPermissionsType::class : AdminRoleEditType::class, $role);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $this->manager->persist($role);
                $this->manager->flush();
                $this->addFlash('notif', 'Rôle édité avec succès !');
            } else
                $this->addFlash('notif', 'Impossible d\'éditer ce rôle.');
        }

        return $form;
    }

    /**
     * @Route("/{id}", name="admin.roles.delete", methods={"DELETE"})
     * @param Request $request
     * @param Role $role
     * @return Response
     */
    public function delete(Request $request, Role $role): Response
    {
        if ($this->isCsrfTokenValid('delete' . $role->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($role);
            $entityManager->flush();
            $this->addFlash('notif', 'Rôle supprimé avec succès !');
        }

        return $this->redirectToRoute('admin.roles.index');
    }
}
