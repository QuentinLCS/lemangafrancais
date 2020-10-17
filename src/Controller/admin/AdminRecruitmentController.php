<?php

namespace App\Controller\admin;

use App\Entity\Candidature;
use App\Entity\Recrutement;
use App\Form\Recruitment\RecruitmentEditType;
use App\Repository\RecrutementRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/{_locale}/admin/recruitment")
 */
class AdminRecruitmentController extends AbstractController
{

    /**
     * @var RecrutementRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * AdminRolesController constructor.
     * @param RecrutementRepository $recrutementRepository
     * @param ObjectManager $manager
     */
    public function __construct(RecrutementRepository $recrutementRepository, ObjectManager $manager)
    {
        $this->repository = $recrutementRepository;
        $this->manager = $manager;
    }

    /**
     * @Route("", name="admin.recruitment.index")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {

        $form = $this->new($request);

        return $this->render('admin/admin_recruitment/admin_recruitment_index.html.twig', [
            'current_page' => 'admin_recruitment',
            'allJobs' => $this->repository->findAll(),
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}-{id}", name="admin.recruitment.show", methods="GET|POST", requirements={"slug": "[a-z0-9\-]*"})
     * @param Recrutement $recrutement
     * @param string $slug
     * @param Request $request
     * @return Response
     */
    public function show(Recrutement $recrutement, string $slug, Request $request): Response
    {

        if ($recrutement->getSlug() !== $slug)
            return $this->redirectToRoute('admin.recruitment.show', [
                'id' => $recrutement->getId(),
                'slug' => $recrutement->getSlug()
            ], 301);

        $form = $this->edit($recrutement, $request);

        if ($form->isSubmitted() && $form->isValid())
            return $this->redirect($request->getUri());

        return $this->render('admin/admin_recruitment/admin_recruitment_show/admin_recruitment_show_index.html.twig', [
            'current_page' => 'admin_recruitment',
            'job' => $recrutement,
            'form' => $form->createView()
        ]);
    }

    /**
     * @param Request $request
     * @return FormInterface
     */
    private function new(Request $request)
    {
        $recrutement = new Recrutement();
        $form = $this->createForm(RecruitmentEditType::class, $recrutement);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $recrutement->setUtilisateur($this->getUser());
                $this->manager->persist($recrutement);
                $this->manager->flush();
                $this->addFlash('notif', 'Recrutement créé avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de créer ce type de recrutement.');
        }

        return $form;
    }

    /**
     * @param Recrutement $recrutement
     * @param Request $request
     * @return FormInterface
     */
    private function edit(Recrutement $recrutement, Request $request)
    {
        $form = $this->createForm(RecruitmentEditType::class, $recrutement);
        $form->handleRequest($request);

        if ($form->isSubmitted())
            if ($form->isValid()) {
                $this->manager->persist($recrutement);
                $this->manager->flush();
                $this->addFlash('notif', 'Utilisateur modifié avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de modifier cet utilisateur.');

        return $form;
    }

    /**
     * @Route("/{id}", name="admin.recruitment.delete", methods="DELETE")
     * @param Recrutement $recrutement
     * @param Request $request
     * @return Response
     */
    public function delete(Recrutement $recrutement, Request $request)
    {
        if ($this->isCsrfTokenValid(sprintf("delete%s", $recrutement->getId()), $request->get('_token'))) {
            $this->manager->remove($recrutement);
            $this->manager->flush();
            $this->addFlash('notif', 'Utilisateur supprimé avec succès !');
        }
        return $this->redirectToRoute('admin.recruitment.index');
    }

    /**
     * @Route("/{slug}-{jobId}/{id}", name="admin.application.show", methods="GET|POST", requirements={"slug": "[a-z0-9\-]*"})
     * @param Candidature $candidature
     * @param string $slug
     * @param Request $request
     * @return Response
     */
    public function showApplication(Candidature $candidature, string $slug, Request $request): Response
    {

        $recrutement = $candidature->getRecrutement();

        if ($recrutement->getSlug() !== $slug)
            return $this->redirectToRoute('admin.recruitment.show', [
                'jobId' => $recrutement->getId(),
                'slug' => $recrutement->getSlug()
            ], 301);

        $form = $this->edit($recrutement, $request);

        if ($form->isSubmitted() && $form->isValid())
            return $this->redirect($request->getUri());

        return $this->render('admin/admin_recruitment/admin_recruitment_show/admin_recruitment_show_application/admin_recruitment_show_application_index.html.twig', [
            'current_page' => 'admin_recruitment',
            'application' => $candidature,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/{slug}-{jobId}/{id}/delete", name="admin.application.delete", methods="DELETE")
     * @param Candidature $candidature
     * @param Request $request
     * @return Response
     */
    public function deleteApplication(Candidature $candidature, Request $request)
    {
        if ($this->isCsrfTokenValid(sprintf("delete%s", $candidature->getId()), $request->get('_token'))) {
            $this->manager->remove($candidature);
            $this->manager->flush();
            $this->addFlash('notif', 'Candidature supprimée avec succès !');
        }

        return $this->redirectToRoute('admin.recruitment.show', [
            'id' => $candidature->getRecrutement()->getId(),
            'slug' => $candidature->getRecrutement()->getSlug()
        ]);
    }

    /**
     * @Route("/{slug}-{jobId}/{id}/accept", name="admin.application.accept", methods="ACCEPT")
     * @param Candidature $candidature
     * @param Request $request
     * @return Response
     */
    public function acceptApplication(Candidature $candidature, Request $request)
    {
        if ($this->isCsrfTokenValid(sprintf("accept%s", $candidature->getId()), $request->get('_token'))) {
            $candidature->setCanEtat('Accepted');
            $this->manager->flush();
            $this->addFlash('notif', 'Candidature acceptée avec succès !');
        }

        return $this->redirectToRoute('admin.recruitment.show', [
            'id' => $candidature->getRecrutement()->getId(),
            'slug' => $candidature->getRecrutement()->getSlug()
        ]);
    }

    /**
     * @Route("/{slug}-{jobId}/{id}/refuse", name="admin.application.refuse", methods="REFUSE")
     * @param Candidature $candidature
     * @param Request $request
     * @return Response
     */
    public function refuseApplication(Candidature $candidature, Request $request)
    {
        if ($this->isCsrfTokenValid(sprintf("refuse%s", $candidature->getId()), $request->get('_token'))) {
            $candidature->setCanEtat('Refused');
            $this->manager->flush();
            $this->addFlash('notif', 'Candidature refusée avec succès !');
        }

        return $this->redirectToRoute('admin.recruitment.show', [
            'id' => $candidature->getRecrutement()->getId(),
            'slug' => $candidature->getRecrutement()->getSlug()
        ]);
    }
}
