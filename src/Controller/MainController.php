<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    // TODO put a slug fields in all ApiResources Entity that can be match with an URL

    #[Route("/index", name: 'index')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig');
    }

//     Route("/dashboard{reactRouting}", name="dashboard", requirements={"reactRouting"=".+"}, defaults={"reactRouting": null})


//     #[Route("/dashboard", name: "dashboard")]
//    public function dashboard(): Response
//    {
//        return $this->render('main/dashboard.html.twig');
//    }

}
