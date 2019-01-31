<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ResultatController extends AbstractController
{
    /**
     * @Route("/resultat", name="resultat")
     */
    public function index()
    {
        return $this->render('resultat/index.html.twig', [
            'controller_name' => 'ResultatController',
        ]);
    }
}
