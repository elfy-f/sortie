<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
   /**
    * @Route("/", name="main_home")
    */
    public function home()
    {
        return $this->render("main/home.html.twig");


    }

    /**
     * @Route("/profil", name="main_profil")
     */
    public function profil()
    {

        return $this->render("main/profil.html.twig");


    }


}