<?php

namespace App\Controller\news;

use App\Entity\News;
use App\Entity\NewsSearch;
use App\Form\News\NewsSearchType;
use App\Repository\NewsRepository;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class NewsController
 * @package App\Controller
 * @Route("/{_locale}/news")
 */
class NewsController extends AbstractController{

    /**
     * @var NewsRepository
     */
    private $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("", name="news.index")
     * @param PaginatorInterface $paginator
     * @param Request $request
     * @param NewsRepository $repository
     * @return Response
     */
    public function index(PaginatorInterface $paginator, Request $request, NewsRepository $repository): Response
    {
        $search = new NewsSearch();
        $form =$this->createForm(NewsSearchType::class, $search);
        $form->handleRequest($request);
        $news = $paginator->paginate(
            $this->repository->findAllVisibleQuery($search),
            $request->query->getInt('page',1),
            4
        );
        //$news = $this->repository->findAll();
        return $this->render('news/news_index.html.twig', [
            'current_page' => 'news',
            'news' => $news,
            'form' => $form->createView(),
            'formsmall' => $form->createView()
        ]);
    }

    /**
     * @Route("/{id}", name="news.show")
     * @param News $news
     * @return Response
     */
    public function show(News $news): Response
    {
        $form = $this->createFormBuilder()
            ->add('content', CKEditorType::class, [
                'config' => [
                    'uiColor' => "e2e2e2",
                    'toolbar' => 'full',
                    'required' => true
                ]
            ])
            ->getForm();

        return $this->render('news/news_show.html.twig', [
            'current_page' => 'news',
            'actu' => $news,
            'form' => $form->createView()
        ]);
    }
}