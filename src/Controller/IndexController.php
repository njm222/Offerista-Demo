<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home", methods={"GET", "HEAD"})
     */
    public function index() {
        return $this->render('index.html.twig');
    }

}