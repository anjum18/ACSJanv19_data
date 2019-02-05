<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\DomCrawler\Crawler;


class ScrapingController extends AbstractController
{
    /**
     * @Route("/scraping", name="scraping")
     */
    public function index()
    {
        // create curl resourcephph
        $ch = curl_init();

        // set url


        curl_setopt($ch, CURLOPT_URL, "https://www.naissance.fr/prenoms/top50/2018");
        // curl_setopt($ch, CURLOPT_URL, "https://www.prenoms.com/prenom/AGATHE.html");
   
        //return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // $output contains the output string
        $output = curl_exec($ch);
        // close curl resource to free up system resources

        curl_close($ch);
y
        $crawler = new Crawler($output);


      

        $texteFete = $crawler->filter('div.columns .clearfix  > ul ')->text();
        // $texteFete = $crawler->filter('div.columns .clearfix  > ul ')->text();

        // $texteFete = $crawler->filter('div.illustration > p ')->text();
     
        return $this->render('scraping/index.html.twig', [
            'texte_fete' =>$texteFete,
        ]);
    }
}
