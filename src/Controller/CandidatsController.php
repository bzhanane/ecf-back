<?php

namespace App\Controller;

use App\Entity\Jobs;
use App\Entity\Offer;
use App\Form\OfferType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CandidatsController extends AbstractController
{

    private EntityManagerInterface $entityManager;
    private $repo;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repo = $entityManager->getRepository(Jobs::class);
    }

    /**
     * @Route("/candidats", name="app_candidats")
     */

    public function index(): Response
    {
        $liste = $this->repo->findAll();
        return $this->render('candidats/listeJobs.html.twig', [
            'controller_name' => 'CandidatsController',
            'liste' => $liste
        ]);
    }

    /**
     * @Route("/candidats/offer/{id}", name="new_offer")
     */
    public function new(Request $request, int $id)
    {
        $offer = new Offer();
        $offer->setJob($this->repo->findOneBy(["id"=>$id]));
        $form = $this->createForm(OfferType::class, $offer);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $offer = $form->getData();

            $this->entityManager->persist($offer);
            $this->entityManager->flush();

            return $this->redirectToRoute("app_candidats");

        }

        return $this->render(
            'candidats/index.html.twig',
            ['form' => $form->createView()]
        );
    }

}
