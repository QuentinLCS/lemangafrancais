<?php


namespace App\Controller\lexicon;


use App\Entity\LexiqueSearch;
use App\Form\Lexicon\LexiqueSearchType;
use App\Repository\LexiqueRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class LexiconController
 * @package App\Controller
 * @Route("/{_locale}/lexicon")
 */
class LexiconController extends AbstractController
{
    private $repository;
     public function __construct(LexiqueRepository $Repository)
    {
        $this->repository= $Repository;
    }

    /**
     * @Route("", name="lexicon.index")
     *
     * @param Request $request
     * @param PaginatorInterface $paginator
     * @return Response
     */
    public function index(Request $request,PaginatorInterface $paginator): Response
    {
        $search = new LexiqueSearch();
        $searchForm = $this->createForm(LexiqueSearchType::class,$search);
        $searchForm->handleRequest($request);

        $lexiquePage = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page', 1),
            10
        );
        return $this->render('lexicon/lexicon_index.html.twig', [
            'current_page' => 'lexicon',
            'pageLexicons' => $lexiquePage,
            'searchForm' => $searchForm->createView()
        ]);
    }

}