<?php


namespace App\Controller\support;


use App\Entity\Ticket;
use App\Form\Ticket\TicketEditType;
use App\Repository\QuestionRepository;
use App\Repository\TicketRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class SupportController
 * @package App\Controller
 * @Route("/{_locale}/support")
 */
class SupportController extends AbstractController
{

    private $repositoryFAQ;
    private $repositoryTicket;
    private $manager;

    public function __construct(QuestionRepository $repositoryFAQ, TicketRepository $repositoryTicket,ObjectManager $manager)
    {
        $this->repositoryFAQ= $repositoryFAQ;
        $this->repositoryTicket =$repositoryTicket;
        $this->manager = $manager;
    }

    /**
     * @Route("", name="support.index")
     * @return Response
     */
    public function index(Request $request): Response
    {
        $faq = $this->repositoryFAQ->findAll();

        $ticket= new Ticket();

        $form = $this->createForm(TicketEditType::class, $ticket);
        $form->handleRequest($request);



        if ($form->isSubmitted()) {
            if($this->getUser()==null)
                $this->addFlash('notif', 'Vous devez être connecté pour poster un ticket !');
            else if ($form->isValid()) {
                $ticket->setUtilisateur($this->getUser());
                $this->manager->persist($ticket);
                $this->manager->flush();
                $this->addFlash('notif', 'Ticket envoyé avec succés');
                return $this->redirectToRoute('support.index');
            }
            else{
                $this->addFlash('notif', 'Le formulaire n\' pas valide');
            }
        }


        return $this->render('support/support_index.html.twig', [
            'current_page' => 'support',
            'faq' => $faq,
            'form' => $form->createView()
        ]);
    }

}