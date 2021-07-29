<?php


namespace App\Controller;

use App\Entity\Sortie;
use App\Form\SortieType;
use App\Repository\SortieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/sortie", name="sortie_")
 */

class SortiesController extends AbstractController

{
    /**
     * @Route ("/details/{id}", name="details")
     */


    public function details(int $id, SortieRepository $sortieRepository): Response
    {
        $sortie = $sortieRepository->find($id);

        return $this->render("sortie/details.html.twig", [
            "sortie" => $sortie
        ]);

    }


    /**
     * @Route ("/create", name="create")
     */


    public function create(int $id): Response
    {


        return $this->render("sortie/create.html.twig", [

        ]);

    }



/**
 * @Route("/sortie", name="main_sorties")
 */

public
function sorties(
    Request $request,
    EntityManagerInterface $entityManager
): Response
{
    $sortie = new Sortie();
    $sortieForm = $this->createForm(SortieType::class, $sortie);

    $sortieForm->handleRequest($request);

    if ($sortieForm->isSubmitted()) {
        $sortie->setDateCreated(new \DateTime());
        $entityManager->persist($sortie);
        $entityManager->flush();

        $this->addFlash('success', 'validé!');
        return $this->redirectToRoute('sortie_details', ['id' => $sortie->getId()]);
    }

    return $this->render("main/sorties.html.twig", [
        "sortieForm" => $sortieForm->createView()
    ]);


}
}
