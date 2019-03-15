<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class HopiController extends AbstractController
{
    /**
     * @Route("/", name="app_accueil")
     */
    public function acceuil()
    {
        return $this->render('hopi/accueil.html.twig');
    }
}