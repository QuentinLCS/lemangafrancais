<?php


namespace App\Controller\creation;


use App\Entity\NewsSearch;
use App\Entity\Scenario;
use App\Entity\ScenarioSearch;
use App\Form\News\NewsSearchType;
use App\Form\Scenario\ScenarioSearchType;
use App\Repository\PublicationRepository;
use App\Repository\ScenarioRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ScenarioController
 * @package App\Controller
 * @Route("/{_locale}/scenario")
 */
class ScenarioController extends AbstractController
{
    private $repository;
    public function __construct(ScenarioRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("", name="scenario.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $search = new ScenarioSearch();
        $searchForm = $this->createForm(ScenarioSearchType::class,$search);
        $searchForm->handleRequest($request);

        $scenarioPage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('creation/scenario/scenario_index.html.twig', [
            'current_page' => 'scenario',
            'scenario' => $scenarioPage,
            'searchForm' => $searchForm->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="scenario.show")
     * @param Scenario $scenario
     * @return Response
     */
    public function show(Scenario $scenario): Response
    {
        return $this->render('creation/scenario/scenario_post.html.twig', [
            'current_page' => 'scenario',
            'scenario' => $scenario
        ]);
    }

}