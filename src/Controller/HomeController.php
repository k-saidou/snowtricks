<?php

namespace App\Controller;

use App\Entity\Tricks;
use App\Repository\TricksRepository;
use App\Repository\MediaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(TricksRepository $TricksRepository, MediaRepository $MediaRepository): Response
    {

        $trick = $TricksRepository->findAll();
        $media = $MediaRepository->findAll();
        return $this->render('home/index.html.twig', [
            'trick' => $trick,
            'media' => $media,
        ]);
    }
}
