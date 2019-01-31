<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Prenom;

class PrenomController extends AbstractController
{
    /**
     * @Route("/prenom", name="prenom")
     */
    public function index()
    {
    
    	$em = $this->getDoctrine()->getManager();
    	$prenom = $em->getRepository(Prenom::class)->findOneBy(['nom'=>'AADEL']);
    	$name = $em->getRepository(Prenom::class)->findByNom(['AARON','CAMILLE']);
    	$maxByYear = $em->getRepository(Prenom::class)->findMaxByYear('1971');

    	$minByYear = $em->getRepository(Prenom::class)->findMinByYear('1971');

    	return $this->render('prenom/index.html.twig', [
    		'controller_name' => 'PrenomController',
    		'page'=>'Prénoms d\'avant',
    		'nom' => $name,
    		'topNom'=>$maxByYear,
    		'bottomNom' => $minByYear
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
