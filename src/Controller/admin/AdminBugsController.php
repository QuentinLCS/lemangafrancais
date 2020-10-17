<?php


namespace App\Controller\admin;


use App\Entity\Ticket;
use App\Repository\TicketRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdminBugsController
 * @package App\Controller
 * @Route("/{_locale}/admin/bugs")
 */
class AdminBugsController extends AbstractController
{


    private $repository;


    public function __construct(TicketRepository $Repository)
    {
        $this->repository= $Repository;
    }

    /**
     * @Route("", name="admin.bugs.index")
     * @return Response
     */
    public function index(): Response
    {
        $bugs = $this->repository->findByType('probleme');
        return $this->render('admin/admin_bugs/admin_bugs_index.html.twig', [
            'current_page' => 'admin_bugs',
            'bugs' => $bugs
        ]);
    }


    /**
     * @Route("/edit-{id}",name="admin.bugs.show", methods="GET|POST", requirements={"id": "[edit\-0-9]*"})
     * @param Ticket $ticket
     * @param Request $request
     * @return Response
     */
    public function show(Ticket $ticket, Request  $request): Response
    {

        return $this->render('admin/admin_bugs/admin_bugs_show.html.twig', [
            'current_page' => 'admin_help',
            'bug' => $ticket
        ]);
    }

}