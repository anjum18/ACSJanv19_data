<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\Recherche;
use App\Form\RechercheType;
use App\Entity\Prenom;
// use OC\PlatformBundle\Form\RechercheType;

class PrenomController extends AbstractController
{
    /**
     * @Route("/prenom", name="prenom")
     */
    public function index()
    {
    
    	$em = $this->getDoctrine()->getManager();
    	// $prenom = $em->getRepository(Prenom::class)->findOneBy(['nom'=>'AADEL']);
    	// $name = $em->getRepository(Prenom::class)->findByNom(['AARON','CAMILLE']);
    	$maxByYear = $em->getRepository(Prenom::class)->findMaxByYear('1995');

    	$minByYear = $em->getRepository(Prenom::class)->findMinByYear('1995');

    	$form = $this->createForm(RechercheType::class);

    	return $this->render('prenom/index.html.twig', [
    		'controller_name' => 'PrenomController',
    		'page'=>'Prénoms d\'avant',
    		'nom' => $name,
    		'topNom'=>$maxByYear,
    		'bottomNom' => $minByYear,
    		'form' => $form->createView()
    	]);
    }

    public function register()
    {
    	if ($this->app->environment() !== 'production') {
    		$this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
    		$this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
    	}
    // ...
    }
}
