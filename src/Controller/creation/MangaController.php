<?php


namespace App\Controller\creation;


use App\Entity\Illustration;
use App\Entity\Manga;
use App\Entity\MangaSearch;
use App\Entity\NewsSearch;
use App\Form\manga\MangaSearchType;
use App\Repository\MangaRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MangaController
 * @package App\Controller
 * @Route("/{_locale}/manga")
 */
class MangaController extends AbstractController
{
    private $repository;
    public function __construct(MangaRepository $repository)
    {
        $this->repository = $repository;
    }
    /**
     * @Route("", name="manga.index")
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $search = new MangaSearch();
        $searchForm = $this->createForm(MangaSearchType::class,$search);
        $searchForm->handleRequest($request);
        $mangaPage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('creation/manga/manga_index.html.twig', [
            'current_page' => 'illustration',
            'manga' => $mangaPage,
            'searchForm' => $searchForm->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="manga.show")
     * @param Manga $manga
     * @return Response
     */
    public function show(Manga $manga) : Response {
        return $this->render('creation/manga/manga_post.html.twig', [
            'current_page' => 'manga',
            'manga' => $manga
        ]);
    }
}