<?php


namespace App\Controller\creation;


use App\Entity\Candidature;
use App\Entity\Recrutement;
use App\Form\Recruitment\ApplicationEditType;
use App\Repository\RecrutementRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class RecruitmentController
 * @package App\Controller
 * @Route("/{_locale}/recruitment")
 */
class RecruitmentController extends AbstractController
{

    /**
     * @var RecrutementRepository
     */
    private $repository;
    /**
     * @var ObjectManager
     */
    private $manager;

    public function __construct(RecrutementRepository $repository, ObjectManager $manager)
    {
        $this->repository = $repository;
        $this->manager = $manager;
    }

    /**
     * @Route("", name="recruitment.index")
     * @return Response
     * @throws \Exception
     */
    public function index(): Response
    {

        return $this->render('creation/recruitment/recruitment_index.html.twig', [
            'current_page' => 'recruitment',
            'officialJobs' => $this->repository->findOfficialJobs(),
            'otherJobs' => $this->repository->findOtherJobs()
        ]);
    }

    /**
     * @Route("/{slug}-{id}", name="recruitment.show", requirements={"slug": "[a-z0-9\-]*"})
     * @param Recrutement $recrutement
     * @param Request $request
     * @return Response
     */
    public function show(Recrutement $recrutement, string $slug, Request $request): Response
    {
        if ($recrutement->getSlug() !== $slug)
            return $this->redirectToRoute('admin.roles.show', [
                'id' => $recrutement->getId(),
                'slug' => $recrutement->getSlug()
            ], 301);

        return $this->render('creation/recruitment/recruitment_show.html.twig', [
            'current_page' => 'recruitment_show',
            'job' => $recrutement,
        ]);
    }


    /**
     * @Route("/{slug}-{id}/apply", name="recruitment.apply", requirements={"slug": "[a-z0-9\-]*"})
     * IsGranted("ROLE_USER_APPLY")
     * @param Recrutement $recrutement
     * @param Request $request
     * @return Response
     * @throws \Exception
     */
    public function apply(Recrutement $recrutement, string $slug, Request $request): Response
    {
        if ($recrutement->getSlug() !== $slug)
            return $this->redirectToRoute('admin.roles.show', [
                'id' => $recrutement->getId(),
                'slug' => $recrutement->getSlug()
            ], 301);


        $candidature = new Candidature();
        $candidature->setUtilisateur($this->getUser());
        $candidature->setRecrutement($recrutement);
        $candidature->setCanDate(new \DateTime());

        $form = $this->createForm(ApplicationEditType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $candidature->setCanEtat('New');
                $this->manager->persist($recrutement);
                $this->manager->flush();
                $this->addFlash('notif', 'Candidature créée avec succès !');
            } else
                $this->addFlash('notif', 'Impossible de créer cette candidature.');
        }

        if ($form->isSubmitted() && $form->isValid())
            return $this->redirectToRoute('users.show', ['id' => $this->getUser()->getId()]);

        return $this->render('creation/recruitment/recruitment_apply.html.twig', [
            'current_page' => 'recruitment_apply',
            'job' => $recrutement,
            'form' => $form->createView()
        ]);
    }

}