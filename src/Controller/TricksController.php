<?php

namespace App\Controller;

use App\Entity\Tricks;
use App\Form\TricksType;
use App\Entity\Commentaire;
use App\Entity\Media;
use App\Entity\User;
use App\Form\CommentaireType;
use App\Repository\TricksRepository;
use App\Repository\CommentaireRepository;
use App\Repository\MediaRepository;
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
    public function new(Request $request, TricksRepository $tricksRepository, MediaRepository $mediaRepository, SluggerInterface $slugger): Response
    {
        $trick = new Tricks();
        $form = $this->createForm(TricksType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageUne = $form->get('imageUne')->getData();
            $images = $form->get('image')->getData();
            $video = $form->get('video')->getData();

            if ($video)
            {

                try {

                    $trick = new Tricks;
                    $video->setTricks($trick);

                    // updates the 'imagename' property to store the PDF file name
                    // instead of its contents
                    $trick->setVideo($video);
                    $tricksRepository->add($video, true);
    
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
            }

            if ($imageUne) {
               
                    $originalFilename = pathinfo($imageUne->getClientOriginalName(), PATHINFO_FILENAME);
                    // this is needed to safely include the file name as part of the URL
                    $safeFilename = $slugger->slug($originalFilename);
                    $newFilename = $safeFilename.'-'.uniqid().'.'.$imageUne->guessExtension();

                    // Move the file to the directory where brochures are stored
                    try {
                        $imageUne->move(
                            $this->getParameter('brochures_directory'),
                            $newFilename
                        );

                        // updates the 'imagename' property to store the PDF file name
                        // instead of its contents
        
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }
                    // updates the 'imagename' property to store the PDF file name
                    // instead of its contents
                    $trick->setImageUne($newFilename);
                    $tricksRepository->add($trick, true);

                

            }
            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
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
     * @Route("/{id}", name="app_tricks_show", methods={"GET", "POST"})
     */
    public function show(Request $request, Tricks $trick, CommentaireRepository $commentaireRepository): Response
    {

        // id utilisateur //
        $user = $this->getUser();

        $commentaire = new Commentaire();
        $commentaire->setDate(new \DateTime('now'));
        $commentaire->setIdTricks($trick);
        $commentaire->setIdUser($user);
              $form = $this->createForm(CommentaireType::class, $commentaire);
              $form->handleRequest($request);
      
              if ($form->isSubmitted() && $form->isValid()) {
                  $commentaireRepository->add($commentaire, true);
      
                  return $this->redirectToRoute('app_tricks_show', ["id" =>$trick->getId()], Response::HTTP_SEE_OTHER);
              }
        return $this->render('tricks/show.html.twig', [
            'trick' => $trick,
            'commentaire' => $commentaire,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_tricks_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Tricks $trick, TricksRepository $tricksRepository, MediaRepository $mediaRepository, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(TricksType::class, $trick);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $images = $form->get('image')->getData();
            $imageUne = $form->get('imageUne')->getData();

            if ($imageUne) {
               
                $originalFilename = pathinfo($imageUne->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$imageUne->guessExtension();

                // Move the file to the directory where brochures are stored
                try {
                    $imageUne->move(
                        $this->getParameter('brochures_directory'),
                        $newFilename
                    );

                    // updates the 'imagename' property to store the PDF file name
                    // instead of its contents
    
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }
                // updates the 'imagename' property to store the PDF file name
                // instead of its contents
                $trick->setImageUne($newFilename);
                $tricksRepository->add($trick, true);

            

        }
            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
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
     * @Route("/{id}/delete", name="app_tricks_delete", methods={"GET"})
     */
    public function delete(Request $request, Tricks $trick, TricksRepository $tricksRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$trick->getId(), $request->request->get('_token'))) {
            $tricksRepository->remove($trick, true);
        }

        return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
    }
}
