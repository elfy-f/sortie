<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Security\AppAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request,
                             UserPasswordEncoderInterface $passwordEncoder,
                        UserAuthenticatorInterface $authenticator ,
                      AppAuthenticator $formAuthenticator
    ): Response
    {
        $User = new User();
       $User->setRoles(["ROLE_ADMIN"]);
       $form = $this->createdForm (RegistrationFormType::class, $User);
       $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $User->setPassword(
                $passwordEncoder->encodePassword(
                    $User,
                    $form->get('plainPassword')->getData()
                )
           );

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($User);
            $entityManager->flush();

            return $authenticator->authenticateUser(
                $User,
                $formAuthenticator,
                $request);
        }

       return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),]); }






}
