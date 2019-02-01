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
    	$name = $em->getRepository(Prenom::class)->findMaxByYear(['annee']);
    
    	dump($name);

    	return $this->render('prenom/index.html.twig', [
    		'controller_name' => 'PrenomController',
    		'page'=>'Prénoms d\'avant',
    		'nom' => $name
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
