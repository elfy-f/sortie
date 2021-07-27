<?php



namespace App\Controller;


    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Routing\Annotation\Route;

class userController extends AbstractController
{

    /**
     * @Route("/user", name="main_user")
     */
    public function user()
    {

        return $this->render("main/user.html.twig/");

    }
}