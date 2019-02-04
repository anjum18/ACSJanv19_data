<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\CherchenomType;
use App\Entity\Prenom;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\HttpFoundation\Response;

class CherchenomController extends AbstractController
{
    /**
     * @Route("/cherchenom", name="cherchenom")
     */
    public function index(request $request)
    {

		$form = $this->createForm(CherchenomType::class);
        $form->handleRequest($request);
       
        $q = $request->query->get('term'); // use "term" instead of "q" for jquery-ui
        $results = $this->getDoctrine()->getRepository('App:Prenom')->findByNom($q);

        if ($form->isSubmitted() && $form->isValid()) {
 
            $contactFormData = $form->getData();

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
        $q = strtoupper($request->query->get('term')); // use "term" instead of "q" for jquery-ui

        $results = $this->getDoctrine()->getRepository('App:Prenom')->findByNomLike($q);
        //like name : faire une fonction qui cherche selon le début du mot
        return $this->render('cherchenom/search.json.twig', ['results' => $results]);
        // return $this->render('your_template.json.twig', ['results' => $results]);
        //chemin en get
    }

    public function getPrenom($id = null)
    {
        $prenom = $this->getDoctrine()->getRepository('App:Prenom')->find($id);

        return $this->json($prenom->getNom());
    }

    public function howManyPerYear() {
        if (isset($_POST['inputNom'])) {
            $nom = $_POST['inputNom'];
            $date = $_POST['inputDate'];
            $em = $this->getDoctrine()->getManager();
            $numberPerYear = $em->getRepository(Prenom::class)->howManyForYear($nom, $date);

            $serializer = $this->container->get('serializer');
            $reports = $serializer->serialize($numberPerYear, 'json');

            return new Response($reports);

        }else {
            return $this->render('cherchenom/index.html.twig', [
                'numberPerYear' => 'probleme'
            ]);
        }

    }
}
