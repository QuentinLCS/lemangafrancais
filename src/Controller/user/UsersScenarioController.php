<?php


namespace App\Controller\user;


use App\Entity\Scenario;
use App\Entity\Utilisateur;
use App\Form\Scenario\ScenarioType;
use App\Repository\ScenarioRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Knp\Component\Pager\PaginatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\CliDumper;
use Symfony\Component\VarDumper\Dumper\ContextProvider\CliContextProvider;
use Symfony\Component\VarDumper\Dumper\ContextProvider\SourceContextProvider;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;
use Symfony\Component\VarDumper\Dumper\ServerDumper;
use Symfony\Component\VarDumper\VarDumper;

class UsersScenarioController extends AbstractController
{
    /**
     * @var ScenarioRepository
     */
    private $scenarioRepository;

    /**
     * @var ObjectManager
     */
    private $manager;

    /**
     * UsersScenarioController constructor.
     * @param ScenarioRepository $scenarioRepository
     * @param ObjectManager $manager
     */
    public function __construct(ScenarioRepository $scenarioRepository, ObjectManager $manager)
    {
        $this->scenarioRepository = $scenarioRepository;
        $this->manager = $manager;
    }

    /**
     * @Route("/{id}/indexScenario", name="usersScenario.index", methods="GET|POST")
     * @param Utilisateur $utilisateur
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Utilisateur $utilisateur,Request $request, PaginatorInterface $paginator): Response
    {
        $ScenarioPage = $paginator->paginate(
            $utilisateur->getUtiScenario(),
            $request->query->getInt('page', 1),
            6
        );
        return $this->render('users/users_show/users_show_creations/users_show_scenario.html.twig',[
            'current_page' => 'show_scenario',
            'allScenario' => $ScenarioPage,
            'user' => $utilisateur,
        ]);
    }

    /**
     * @Route("/{id}/addScenario", name="usersScenario.addScenario", methods="GET|POST")
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
                return $this->redirectToRoute("usersScenario.index",['id'=>$utilisateur->getId()]);
            } else
            {
                $this->addFlash('notif', 'Impossible de créer le scenario.');
                return $this->redirectToRoute("usersScenario.index",['utilisateur'=>$utilisateur->getId()]);
            }
        }
        return $this->render('users/users_show/users_show_creations/users_show_scenario_addform.html.twig',[
            'current_page' => 'scenario_show',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/editScenario/{utilisateur}/{scenario}", name="usersScenario.editScenario", methods="GET|POST")
     * @param Request $request
     * @param Utilisateur $utilisateur
     * @param Scenario $scenario
     * @return Response
     */
    public function edit(Request $request,Utilisateur $utilisateur, Scenario $scenario) : Response
    {
        $form = $this->createForm(ScenarioType::class, $scenario);
        $form->handleRequest($request);
        if ($form->isSubmitted())
        {
            if($form->isValid())
            {
                $scenario->addUtilisateurs($utilisateur);
                $this->addFlash('notif', 'Scenario édité avec succès !');
                $this->manager->flush();
                return $this->redirectToRoute("usersScenario.index",['id'=>$utilisateur->getId()]);
            }
            else
            {
                $this->addFlash('notif', 'Impossible d\'éditer le scénario .');
                return $this->redirectToRoute("usersScenario.index",['utilisateur'=>$utilisateur->getId()]);
            }
        }
        return $this->render('users/users_show/users_show_creations/users_show_scenario_editform.html.twig',[
            'current_page' => 'scenario_edit_user',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/deleteScenario/{utilisateur}/{scenario}", name="usersScenario.deleteScenario", methods="DELETE")
     * @param Request $request
     * @param Scenario $scenario
     * @param Utilisateur $utilisateur
     * @return Response
     */
    public function delete(Request $request,Scenario $scenario, Utilisateur $utilisateur) : Response
    {
        if ($this->isCsrfTokenValid('delete' . $scenario->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($scenario);
            $entityManager->flush();
            $this->addFlash('notif', 'Scénario supprimé avec succès !');
        }

        return $this->redirectToRoute('usersScenario.index',["id"=>$utilisateur->getId()]);
    }
}