<?php


namespace App\Controller;

use App\Entity\Sortie;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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