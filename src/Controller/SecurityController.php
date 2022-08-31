<?php

namespace App\Controller;

use App\Entity\User;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
         if ($this->getUser()) {
             return $this->redirectToRoute('api_entrypoint');
         }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

//    /**
//     * @Route("/dashboard/login", name="api_login", methods={ "POST" })
//     */
//    public function login()
//    {
//        if ($this->getUser()) {
//            $user = $this->getUser();
//            return $this->json([
//                'username' => $user->getUserIdentifier(),
//                'roles' => $user->getRoles(),
//                // 'token' => $this->getUser()->getToken(),
//            ]);
//        }
//        return $this->json([
//            'error' => 'Unauthorized'
//        ], Response::HTTP_UNAUTHORIZED);
//    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        return;
    }
}
