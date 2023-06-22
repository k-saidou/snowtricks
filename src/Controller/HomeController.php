<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(CategorieRepository $CategorieRepository): Response
    {

        $categorie = $CategorieRepository->findAll();
        return $this->render('home/index.html.twig', [
            'categorie' => $categorie,
        ]);
    }
}
