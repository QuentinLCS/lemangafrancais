<?php


namespace App\Controller\admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminPostsController
 * @package App\Controller
 * @Route("/{_locale}/admin/posts")
 */
class AdminPostsController extends AbstractController
{

    /**
     * @Route("", name="admin.posts.index")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('admin/admin_posts/admin_posts_index.html.twig', [
            'current_page' => 'admin_posts'
        ]);
    }

}