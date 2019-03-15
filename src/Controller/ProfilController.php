<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfilController extends  AbstractController
{
    /**
     * @route("/profil", name="app_profil")
     */
    public function profil()
    {
        return $this->render('hopi/profil/profil.html.twig');
    }
    /**
     * @route("/plateau", name="app_plateau")
     */
    public function plateau()
    {
        return $this->render('hopi/profil/plateau/plateau.htlm.twig');
    }
}