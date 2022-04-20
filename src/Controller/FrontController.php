<?php

namespace App\Controller;

use App\Repository\ContinentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ContinentRepository $continentRepo): Response
    {
        $continents = $continentRepo->findAll();

        return $this->render('front/index.html.twig', [
            'continents' => $continents
        ]);
    }
}
