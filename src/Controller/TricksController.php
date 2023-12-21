<?php

namespace App\Controller;

use App\Entity\Tricks;
use App\Form\TricksType;
use App\Entity\Commentaire;
use App\Entity\Media;
use App\Entity\Video;
use App\Entity\User;
use App\Form\CommentaireType;
use App\Repository\TricksRepository;
use App\Repository\CommentaireRepository;
use App\Repository\MediaRepository;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/tricks")
 */
class TricksController extends AbstractController
{
    /**
     * @Route("/", name="app_tricks_index", methods={"GET"})
     */
    public function index(TricksRepository $tricksRepository): Response
    {
        return $this->render('tricks/index.html.twig', [
            'tricks' => $tricksRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_tricks_new", methods={"GET", "POST"})
     */
    public function new(Request $request, TricksRepository $tricksRepository, MediaRepository $mediaRepository, VideoRepository $videoRepository, SluggerInterface $slugger): Response
    {
        $trick = new Tricks();
        $trick->setAjouter(new \DateTime());
        $form = $this->createForm(TricksType::class, $trick, ['slugger' => $slugger]);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $images = $form->get('image')->getData();
            $video1 = $form->get('video1')->getData();
            $video2 = $form->get('video2')->getData();
            $trick->setSlug((string) $slugger->slug($trick->getNom())->lower());

            if ($video1)
            {
                try {
                    $video = new Video;
                    $video->setTrickVideo($trick);
                    $video->setVideo1($video1);
                    $videoRepository->add($video, true);

                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }

            if ($video2)
            {

                try {
                    $video = new Video;
                    $video->setTrickVideo($trick);
                    $video->setVideo1($video1);
                    $videoRepository->add($video, true);
    
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }

            if ($images) {
                foreach ($images as $image)
                {
                    $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$image->guessExtension();

                    // Move the file to the directory where brochures are stored
                    try {
                        $image->move(
                            $this->getParameter('brochures_directory'),
                            $newFilename
                        );
                        $media = new Media;
                        $media->setTricks($trick);

                        // updates the 'imagename' property to store the PDF file name
                        // instead of its contents
                        $media->setImage($newFilename);
                        $mediaRepository->add($media, true);
        
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }
                }

            }

            return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('tricks/new.html.twig', [
            'trick' => $trick,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/tricks/{slug}", name="app_tricks_show", methods={"GET", "POST"})
     */
    public function show(Request $request, Tricks $trick, TricksRepository $tricksRepository, CommentaireRepository $commentaireRepository, string $slug): Response
    {

        $user = $this->getUser();
        $trick = $tricksRepository->findOneBy(['slug' => $slug]);

        $commentaire = new Commentaire();
        $commentaire->setDate(new \DateTime('now'));
        $commentaire->setIdTricks($trick);
        $commentaire->setIdUser($user);

        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);
      
        if ($form->isSubmitted() && $form->isValid()) {
            $commentaireRepository->add($commentaire, true);

            return $this->redirectToRoute('app_tricks_show', ["slug" => $trick->getSlug()], Response::HTTP_SEE_OTHER);

        }

        return $this->render('tricks/show.html.twig', [
            'trick' => $trick,
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="app_tricks_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tricks $trick, TricksRepository $tricksRepository, MediaRepository $mediaRepository, VideoRepository $videoRepository, SluggerInterface $slugger): Response
    {

        $trick->setModifier(new \DateTime());

        $form = $this->createForm(TricksType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $trick->setSlug($slugger->slug($trick->getNom())->lower());
            $trick->setDescription($form->get('description')->getData());
            $trick->setCategorie($form->get('categorie')->getData());
            $trick->setNom($form->get('nom')->getData());

            $tricksRepository->add($trick, true);

            return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
        }
        

        return $this->renderForm('tricks/edit.html.twig', [
            'trick' => $trick,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}/delete", name="app_tricks_delete", methods={"POST"})
     */   
    public function delete(Request $request, Tricks $trick, TricksRepository $tricksRepository): Response
    {
            $tricksRepository->remove($trick, true);

        return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
    }

}