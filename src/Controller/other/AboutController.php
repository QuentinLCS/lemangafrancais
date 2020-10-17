<?php


namespace App\Controller\other;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AboutController
 * @package App\Controller
 * @Route("/{_locale}/about")
 */
class AboutController extends AbstractController
{

    /**
     * @Route("", name="about.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('other/about_index.html.twig', [
            'current_page' => 'about'
        ]);
    }

}