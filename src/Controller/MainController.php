<?php

namespace App\Controller;

use App\Form\SignUpType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="index", defaults={null})
     */
    public function index(): Response
    {
        $form = $this->createForm(SignUpType::class);
        $json = json_encode($form);
        // dump($json);
        return $this->render('main/index.html.twig');
    }
}
