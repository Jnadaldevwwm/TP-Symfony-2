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
    public function index(Request $rq): Response
    {
        if($rq->isMethod('GET')){
            $recetteId = $rq->query->get('recetteId');
            $recette = $this->getDoctrine()
                            ->getRepository('App\Entity\Recettes')
                            ->find($recetteId);
            return $this->render('recette/index.html.twig', [
                'controller_name' => 'RecetteController', 'recette' => $recette
            ]);
        }
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
            $recettes = $this->getDoctrine()
                            ->getRepository('App\Entity\Recettes')
                            ->searchRecetteByKeys($arrayKeyWords);
            return $this->render('recette/search.html.twig', ['controller_name' => 'RecetteController', 'resultRecettes' => $recettes
                    ]);
        } else {
            return $this->render('recette/search.html.twig', ['controller_name' => 'RecetteController', 'resultRecettes' => 'Pas de recette'
                    ]);
        }

        
     }

}
