<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class SortiesController extends AbstractController
{
    /**
     * @Route("/sorties", name="main_sorties")
     */
    public function sorties()
    {
        return $this->render("main/sorties.html.twig");


    }
}