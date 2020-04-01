<?php
/**
 * Created by PhpStorm.
 * User: kidman
 * Date: 31.03.20
 * Time: 17:19
 */

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
/**
 * @Route("/", name="home")
 * @return Response
 */
    public function index(): Response
    {
        return $this->render('app/home.html.twig');
    }
}