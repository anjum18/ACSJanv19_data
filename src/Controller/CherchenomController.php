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
       
        $q = $request->query->get('q'); // use "term" instead of "q" for jquery-ui
        $results = $this->getDoctrine()->getRepository('App:Prenom')->findByNom($q);

        if ($form->isSubmitted() && $form->isValid()) {
 
            $contactFormData = $form->getData();
 var_dump($contactFormData);
		return $this->render('cherchenom/index.html.twig', [
            'controller_name' => 'CherchenomController',
            'form'=>$form->createView(),
            'contactdata'=>$contactFormData,
            'results'=>$results
        ]);
                   }
        return $this->render('cherchenom/index.html.twig', [
            'controller_name' => 'CherchenomController',
            'form'=>$form->createView(),
            'results'=>$results
        ]);
    }

     public function searchPrenom(Request $request)
    {
        $q = $request->query->get('q'); // use "term" instead of "q" for jquery-ui

//créer des routes pour le guider

        $results = $this->getDoctrine()->getRepository('App:Prenom')->findByNom($q);
        //like name : faire une fonction qui cherche selon le début du mot
        return $this->redirect('/bonus', ['results' => $results]);
        // return $this->render('your_template.json.twig', ['results' => $results]);
        //chemin en get

    }

    public function getPrenom($id = null)
    {
        $prenom = $this->getDoctrine()->getRepository('App:Prenom')->find($id);

        return $this->json($prenom->getName());
    }

    //après faut récupérer l'id de l'input caché dans lequel a stocké l'entrée sur laquelle on a cliqué.
}
