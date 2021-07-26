<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class utilisateursController extends AbstractController
{

    /**
     * @Route("/utilisateurs", name="main_utilisateurs")
     */
    public function utilisateurs()
    {

        return $this->render("utilisateurs/profil.html.twig");

}