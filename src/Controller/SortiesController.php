<?php


namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class SortiesController extends AbstractController
{
    /**
     * @Route("/sorties", name="main_sorties")
     */
    public function sorties(Request $request): Response
    {
        $sortie= new Sortie();
        $sortieForm = $this->createForm(SortieType::class, $sortie);


        return $this->render("main/sorties.html.twig", [
            "sortieForm"=>$sortieForm->createView()
        ]);


    }


}