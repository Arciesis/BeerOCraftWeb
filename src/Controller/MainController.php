<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    /**
     * @Template("main/index.html.twig")
     * @Route("/{reactRouting}", name="index", requirements={"reactRouting"=".+"}, defaults={"reactRouting": null})
     */
    public function index(): Response
    {
        $this->getUser()->setRoles(['ROLE_USER', 'ROLE_ADMIN']);

        return $this->render('main/index.html.twig');
    }

}
