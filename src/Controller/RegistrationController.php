<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
    private $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }


    #[Route('/register', name:'app_register', methods:['GET','POST'])]
    public function register(Request $request, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // hash the plain password
            $entityManager = $this->getDoctrine()->getManager()->getRepository(User::class);
            $result = $entityManager->findOneBy([
                'realUsername' => $form->get('realUsername')->getData(),
            ]);

            if ($result !== null) {
                $this->addFlash('register_username_taken', 'Your Username is already taken');
            } else {

                if ($form->get('password')->getData() === $form->get('confirm_password')->getData()) {
                    $user->setPassword(
                        $passwordEncoder->hashPassword(
                            $user,
                            $form->get('password')->getData()
                        )
                    );
                }


                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                // generate a signed url and email it to the user
                $this->emailVerifier->sendEmailConfirmation(
                    'app_verify_email',
                    $user,
                    (new TemplatedEmail())
                        ->from(new Address('postmaster@beerocraft.xyz', 'BeerOCraft'))
                        ->to($user->getEmail())
                        ->subject('Please Confirm your Email')
                        ->htmlTemplate('registration/confirmation_email.html.twig')
                );

                // do anything else you need here, like send an email

                return $this->redirectToRoute('dashboard');
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    #[Route('/verify/email', name:'app_verify_email', methods:['GET','POST'])]
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $exception->getReason());

            return $this->redirectToRoute('app_register');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Your email address has been verified.');

        return $this->redirectToRoute('index');
    }
}
