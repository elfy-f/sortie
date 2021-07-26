<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class utilisateursController extends AbstractController
{

    /**
     * @Route("/profil", name="main_profil")
     */
    public function profil()
    {

        return $this->render("main/profil.html.twig");

}