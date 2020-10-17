<?php


namespace App\Controller\admin;

use App\Entity\Ticket;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminSuggestionsController
 * @package App\Controller
 * @Route("/{_locale}/admin/suggestions")
 */
class AdminSuggestionsController extends AbstractController
{

    private $repository;


    public function __construct(TicketRepository $Repository)
    {
        $this->repository= $Repository;
    }

    /**
     * @Route("", name="admin.suggestions.index")
     * @return Response
     */
    public function index(): Response
    {
        $suggestions = $this->repository->findByType('suggestion');
        return $this->render('admin/admin_suggestions/admin_suggestions_index.html.twig', [
            'current_page' => 'admin_suggestions',
            'suggestions' => $suggestions
        ]);
    }

    /**
     * @Route("/edit-{id}",name="admin.suggestions.show", methods="GET|POST", requirements={"id": "[edit\-0-9]*"})
     * @param Ticket $ticket
     * @param Request $request
     * @return Response
     */
    public function show(Ticket $ticket, Request  $request): Response
    {

        return $this->render('admin/admin_suggestions/admin_suggestions_show.html.twig', [
            'current_page' => 'admin_help',
            'suggestion' => $ticket
        ]);
    }

}