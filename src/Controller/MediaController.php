<?php

namespace App\Controller;

use App\Entity\Media;
use App\Form\MediaType;
use App\Repository\MediaRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

/**
 * @Route("/media")
 */
class MediaController extends AbstractController
{
    /**
     * @Route("/", name="app_media_index", methods={"GET"})
     */
    public function index(MediaRepository $mediaRepository): Response
    {
        return $this->render('media/index.html.twig', [
            'media' => $mediaRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_media_new", methods={"GET", "POST"})
     */
    public function new(Request $request, Media $media, MediaRepository $mediaRepository, SluggerInterface $slugger): Response
    {
        $media = new Media();
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($image) {
                $result =array();
                foreach ($image as $image)
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
                    } catch (FileException $e) {
                        // ... handle exception if something happens during file upload
                    }
                    $result[] = $newFilename;
                }


                // updates the 'imagename' property to store the PDF file name
                // instead of its contents
                $media->setimage(implode(";", $result));
            }
            $mediaRepository->add($media, true);

         //   return $this->redirectToRoute('app_tricks_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('media/new.html.twig', [
            'media' => $media,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_media_show", methods={"GET"})
     */
    public function show(Media $media): Response
    {
        return $this->render('media/show.html.twig', [
            'media' => $media,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_media_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Media $media, MediaRepository $mediaRepository, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(MediaType::class, $media);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get('image')->getData();

            // this condition is needed because the 'brochure' field is not required
            // so the PDF file must be processed only when a file is uploaded
            foreach ($image as $image) {
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
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'imagename' property to store the PDF file name
                // instead of its contents
                $media->setImage($newFilename);
            }
            $mediaRepository->add($media, true);

            return $this->redirectToRoute('app_media_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('media/edit.html.twig', [
            'media' => $media,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_media_delete", methods={"POST"})
     */
    public function delete(Request $request, Media $media, MediaRepository $mediaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$media->getId(), $request->request->get('_token'))) {
            $mediaRepository->remove($media, true);
        }

        return $this->redirectToRoute('app_media_index', [], Response::HTTP_SEE_OTHER);
    }
}
