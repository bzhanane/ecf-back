<?php

namespace App\Controller;


use App\Entity\User;
use App\Form\UserType;
use App\Security\Authenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class HomeController extends AbstractController
{
    private $entityManager;
    private $passwordHasher;
    private $userAuthenticatorInterface;
    private $authenticator;

    public function __construct(EntityManagerInterface $entityManager , UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticatorInterface, Authenticator $authenticator )
    {
        $this->entityManager = $entityManager;
        $this->passwordHasher = $userPasswordHasher;
        $this->authenticator = $authenticator;
        $this->userAuthenticatorInterface = $userAuthenticatorInterface;
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
            $passwordHashed = $this->passwordHasher->hashPassword($user, $user->getPassword());
            $user->setPassword($passwordHashed);
            $user->setRoles(["ROLE_SOCIETE"]);

            $this->entityManager->persist($user);
            $this->entityManager->flush();
            return $this->userAuthenticatorInterface->authenticateUser($user, $this->authenticator, $request);
        }

        return $this->render('home/index.html.twig',
            [
                'form' => $form->createView(),
            ]

        );
    }

}


