<?php


namespace App\Controller\security;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * Class SecuritySigninController
 * @package App\Controller
 * @Route("/{_locale}/signin")
 */
class SecuritySigninController extends AbstractController
{
    /**
     * @Route("", name="signin")
     * @param AuthenticationUtils $authenticationUtils
     * @return bool|Response
     */
    public function signin(AuthenticationUtils $authenticationUtils)
    {

        $lastUsername = $authenticationUtils->getLastUsername();
        $lastError = $authenticationUtils->getLastAuthenticationError();

        return $this->render('security/security_login/security_login_index.html.twig', [
            'current_page' => 'signin',
            'last_username' => $lastUsername,
            'last_error' => $lastError
        ]);
    }
}