<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CherchenomType;
use App\Entity\Prenom;
use Symfony\Component\HttpFoundation\Request;

class CherchenomController extends AbstractController
{
    /**
     * @Route("/cherchenom", name="cherchenom")
     */
    public function index(request $request)
    {

		$form = $this->createForm(CherchenomType::class);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
 
            $contactFormData = $form->getData();
 var_dump($contactFormData);
		return $this->render('cherchenom/index.html.twig', [
            'controller_name' => 'CherchenomController',
            'form'=>$form->createView(),
            'contactdata'=>$contactFormData
        ]);
                   }
        return $this->render('cherchenom/index.html.twig', [
            'controller_name' => 'CherchenomController',
            'form'=>$form->createView(),
        ]);
    }
}
