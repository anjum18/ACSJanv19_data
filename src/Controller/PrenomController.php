<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Recherche;
use App\Form\RechercheType;
use App\Entity\Prenom;
use Symfony\Component\HttpFoundation\Request;
// use OC\PlatformBundle\Form\RechercheType;

class PrenomController extends AbstractController
{
    /**
     * @Route("/prenom", name="prenom")
     */
    public function index(request $request)
    {
    
    	
        $em = $this->getDoctrine()->getManager();
    	$form = $this->createForm(RechercheType::class);
        $form->handleRequest($request);
        $minByYear=0;
        if ($form->isSubmitted() && $form->isValid()) {
 
            $contactFormData = $form->getData();
            
           


        $maxByYear = $em->getRepository(Prenom::class)->findMaxByYear($contactFormData['year']+1900, $contactFormData['genre']);



        $minByYear = $em->getRepository(Prenom::class)->findMinByYear($contactFormData['year']+1900, $contactFormData['genre']);


        return $this->render('resultat/index.html.twig', [
            'controller_name' => 'ResultatController',
            'page'=>'Prénoms d\'avant',
            'noms' => $minByYear,
            'topNom'=>$maxByYear,
            'annee'=>$contactFormData['year']+1900
        ]);

        }
        return $this->render('prenom/index.html.twig', [
            'controller_name' => 'PrenomController',
            'page'=>'Prénoms d\'avant',
            'form' => $form->createView(),
    	]);
    }
// un return dans le if pour renvoyer vers ailleurs
    public function register()
    {
    	if ($this->app->environment() !== 'production') {
    		$this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
    		$this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
    	}
    // ...
    }
}
