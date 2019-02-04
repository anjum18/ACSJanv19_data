<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Recherche;
use App\Form\RechercheType;
use App\Entity\Prenom;
use Symfony\Component\HttpFoundation\Request;


class ResultatController extends AbstractController
{
    /**
     * @Route("/resultat", name="resultat")
     */
    public function index()
    {
    	// $em = $this->getDoctrine()->getManager();
    	// $prenom = $em->getRepository(Prenom::class)->findOneBy(['nom'=>'AADEL']);
    	// $name = $em->getRepository(Prenom::class)->findByNom(['AARON','CAMILLE']);
    	// $maxByYear = $em->getRepository(Prenom::class)->findMaxByYear('1905','1');

    	// $minByYear = $em->getRepository(Prenom::class)->findMinByYear('1905','2');
    	// $form = $this->createForm(CherchenomType::class);
     //     $form->handleRequest($request);
        // $minByYear=0;
        // if ($form->isSubmitted() && $form->isValid()) {
 
        //     $contactFormData = $form->getData();
 
        //     dump($contactFormData);
        // echo $contactFormData['year'];
        //     // do something interesting here
        // $minByYear = $em->getRepository(Prenom::class)->findMinByYear($contactFormData['year']+1900,$contactFormData['genre']);
        // }
        return $this->render('resultat/index.html.twig', [
            'controller_name' => 'ResultatController',
            // "form"=>$form,

    		// 'nom' => $name,
    		// 'topNom'=>$maxByYear,
    		// 'bottomNom' => $minByYear,
        ]);
    }
}
