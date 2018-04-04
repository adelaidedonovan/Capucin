<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/", name="authentification")
     */
    public function index()
    {
        return $this->render('index/authentification.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }



    /**
     * @Route("/indexEleve", name="indexEleve")
     */
    public function indexEleve()
    {
        return $this->render('index/indexEleve.html.twig', [
            'controller_name' => 'Liste Entreprise',
        ]);
    }



    /**
     * @Route("/indexProfesseur", name="indexProfesseur")
     */
    public function indexProfesseur()
    {
        return $this->render('index/indexProfesseur.html.twig', [
            'controller_name' => 'Liste Entreprise',
        ]);
    }

}
