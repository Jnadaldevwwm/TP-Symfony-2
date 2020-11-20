<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Recettes;


class RecetteController extends AbstractController
{
    /**
     * @Route("/recette", name="recette")
     */
    public function index(): Response
    {
        return $this->render('recette/index.html.twig', [
            'controller_name' => 'RecetteController',
        ]);
    }

    /**
     * @Route("/searchRecette", name="searchRecette")
     */

     public function search(Request $rq): Response
     {

        if($rq->isMethod('POST')){
            $searchKeyWords = $rq->request->get('searchKeyWords');
            $arrayKeyWords = explode(' ', $searchKeyWords);
            $recettes = $this->getDoctrine()->getRepository('App\Entity\Recettes')->searchRecetteByKeys($arrayKeyWords);
        }




        return $this->render('recette/search.html.twig', ['controller_name' => 'RecetteController', 'resultRecettes' => $recettes
        ]);
     }

}
