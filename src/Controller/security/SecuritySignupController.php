<?php


namespace App\Controller\security;


use App\Entity\Utilisateur;
use App\Form\security\SecurityUtilisateurSignupType;
use App\Repository\RoleRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * Class SecuritySignupController
 * @package App\Controller
 * @Route("/{_locale}/signup")
 */
class SecuritySignupController extends AbstractController
{

    /**
     * @var ObjectManager
     */
    private $manager;
    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;
    /**
     * @var RoleRepository
     */
    private $roleRepository;

    /**
     * SecuritySignupController constructor.
     * @param ObjectManager $manager
     * @param UserPasswordEncoderInterface $encoder
     * @param RoleRepository $roleRepository
     */
    public function __construct(ObjectManager $manager, UserPasswordEncoderInterface $encoder, RoleRepository $roleRepository)
    {
        $this->manager = $manager;
        $this->encoder = $encoder;
        $this->roleRepository = $roleRepository;
    }

    /**
     * @Route("", name="signup")
     * @param Request $request
     * @return bool|Response
     */
    public function signup(Request $request)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(SecurityUtilisateurSignupType::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            if ($form->isValid()) {
                $utilisateur->setUtiMdp($this->encoder->encodePassword($utilisateur, $form->get('utiMdp')->getData()));
                $utilisateur->addUtiRole($this->roleRepository->find('1'));
                $this->manager->persist($utilisateur);
                $this->manager->flush();
                $this->addFlash('notif', 'Inscription réussie !');
                return $this->redirectToRoute('signin');
            } else
                $this->addFlash('notif', 'Echec de l\'inscription.');
        }
        return $this->render('security/security_login/security_login_index.html.twig', [
            'current_page' => 'signup',
            'addForm' => $form->createView()
        ]);
    }
}