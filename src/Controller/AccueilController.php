<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Recettes;

class AccueilController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        $touteRecettes = $this->getDoctrine()
                            ->getRepository('App\Entity\Recettes')
                            ->findAll();
        shuffle($touteRecettes);
        $randRecettes = array_slice($touteRecettes, 0, 2);
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController', 'randomRecettes' => $randRecettes
        ]);
    }
}
