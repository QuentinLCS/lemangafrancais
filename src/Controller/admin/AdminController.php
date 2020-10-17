<?php


namespace App\Controller\admin;


use App\Repository\NewsRepository;
use App\Repository\UtilisateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminController
 * @package App\Controller
 * @Route("/{_locale}/admin")
 */
class AdminController extends AbstractController
{

    /**
     * @var UtilisateurRepository
     */
    private $utilisateurRepository;

    /**
     * @var NewsRepository
     */
    private $newsRepository;

    /**
     * AdminController constructor.
     * @param UtilisateurRepository $utilisateurRepository
     * @param NewsRepository $newsRepository
     */
    public function __construct(UtilisateurRepository $utilisateurRepository, NewsRepository $newsRepository)
    {
        $this->utilisateurRepository = $utilisateurRepository;
        $this->newsRepository = $newsRepository;
    }

    /**
     * @Route("", name="admin.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('admin/admin_index.html.twig', [
            'current_page' => 'admin_index',
            'nbUsers' => $this->utilisateurRepository->countAll(),
            'nbPosts' => $this->newsRepository->countAll()
        ]);
    }

}