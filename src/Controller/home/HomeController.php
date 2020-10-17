<?php


namespace App\Controller\home;


use App\Repository\NewsRepository;
use App\Repository\RoleRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends AbstractController
{
    /**
     * @var NewsRepository
     */
    private $newsRepository;

    /**
     * AdminUsersController constructor.
     * @param NewsRepository $newsRepository
     */
    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    /**
     * @Route("", name="home")
     * @return Response
     */
    public function localRedirection(): Response
    {
        return $this->redirectToRoute('home.index');
    }

    /**
     * @Route("/{_locale}", name="home.index", requirements={ "_locale": "en|fr"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {

        return $this->render('home/home_index.html.twig', [
            'current_page' => 'home',
            'news' => $this->newsRepository->findAll()
        ]);
    }

}