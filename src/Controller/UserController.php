<?php


namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class UserController extends AbstractController

{
    /**
     * @Route("/User", name="main_User")
     */
    public function User(UserRepository $UserRepository ): Response
    {
        $User= $UserRepository->findAll();





        return $this->render("main/user.html.twig",[
                "user"=>$User
            ]

        );

    }
    /**
     * @Route("/user/details/{id}", name="main_details")
     */
    public function details(int $id): Response
    {

        return $this->render("main/details.html.twig");
    }

    /**
     * @Route("/user/create", name="main_create")
     */
    public function create(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $User = new User();
        $UserForm = $this->createForm(UserType::class, $User);

        $UserForm->handleRequest($request);

        if ($UserForm->isSubmitted() && $UserForm->isValid()) {
            $User->setDateNaissance(new \DateTime());

                $entityManager->persist($user);
                $entityManager->flush();

                $this->addFlash('success', 'utilisatuer ajouté!');
                return $this->redirectToRoute('main_details', ['id' => $User->getId()]);
            }

            return $this->render('main/createUser.html.twig', [
                'userForm' => $UserForm->createView()
            ]);
        }
    }
