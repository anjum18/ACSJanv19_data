<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PrenomController extends AbstractController
{
    /**
     * @Route("/prenom", name="prenom")
     */
    public function index()
    {
        return $this->render('prenom/index.html.twig', [
            'controller_name' => 'PrenomController',
        ]);
    }
}
