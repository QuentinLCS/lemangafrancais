<?php


namespace App\Controller\creation;


use App\Entity\Illustration;
use App\Entity\IllustrationSearch;
use App\Form\Illustration\IllustrationSearchType;
use App\Repository\IllustrationRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class IllustrationController
 * @package App\Controller
 * @Route("/{_locale}/illustration")
 */
class IllustrationController extends AbstractController
{


    private $repository;
    public function __construct(IllustrationRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("", name="illustration.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $search = new IllustrationSearch();
        $searchForm = $this->createForm(IllustrationSearchType::class,$search);
        $searchForm->handleRequest($request);

        $illustrationPage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('creation/illustration/illustration_index.html.twig', [
            'current_page' => 'illustration',
            'illustration' => $illustrationPage,
            'searchForm' => $searchForm->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="illustration.show")
     * @param Illustration $illustrations
     * @return Response
     */
    public function show(Illustration $illustrations): Response {
        return $this->render('creation/illustration/illustration_post.html.twig', [
            'current_page' => 'illustration',
            'illu' => $illustrations
        ]);
    }

}