<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;
    private $repo;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->repo = $entityManager->getRepository(User::class);
    }

    /**
     * @Route("/home", name="index_home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/", name="index_home")
     */
    public function new(Request $request): Response
    {
        $user = new User();
        $user->setRoles(["ROLE_SOCIETE"]);
        $form = $this->createForm(UserType::class, $user);


        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();

            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->redirectToRoute("app_login");
        }

        return $this->render(
            'home/index.html.twig',
            ['form' => $form->createView(),
               ]

        );
    }

}


