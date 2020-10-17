<?php


namespace App\Controller\admin;


use App\Entity\Ticket;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminHelpController
 * @package App\Controller
 * @Route("/{_locale}/admin/help")
 */
class AdminHelpController extends AbstractController
{

    private $repository;


    public function __construct(TicketRepository $Repository)
    {
        $this->repository= $Repository;
    }
    /**
     * @Route("", name="admin.help.index")
     * @return Response
     */
    public function index(): Response
    {
        $questions = $this->repository->findByType('question');
        return $this->render('admin/admin_help/admin_help_index.html.twig', [
            'current_page' => 'admin_help',
            'questions' => $questions
        ]);
    }

    /**
     * @Route("/edit-{id}",name="admin.help.show", methods="GET|POST", requirements={"id": "[edit\-0-9]*"})
     * @param Ticket $ticket
     * @param Request $request
     * @return Response
     */
    public function show(Ticket $ticket, Request  $request): Response
    {

        return $this->render('admin/admin_help/admin_help_show.html.twig', [
            'current_page' => 'admin_help',
            'question' => $ticket
        ]);
    }

}