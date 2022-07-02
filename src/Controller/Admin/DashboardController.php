<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\Jobs;
use App\Entity\Offer;
use App\Repository\JobsRepository;
use App\Repository\OfferRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController {

    protected JobsRepository $jobsRepository;

    public function __construct(JobsRepository $jobsRepository
    )
    {
        $this->jobsRepository = $jobsRepository;
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
            return parent::render('bundles/EasyAdminBundle/welcome.html.twig', [
            'jobs'=> $this->jobsRepository->findAll()
        ]);

    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Devjobs');
    }

    public function configureMenuItems(): iterable
    {    $user = $this->getUser();

        if ( $user && in_array("ROLE_ADMIN", $user->getRoles())){
            yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
            yield MenuItem::linkToCrud('Entreprises', 'fas fa-list',Company::class);
            yield MenuItem::linkToCrud('offres', 'fas fa-list',Offer::class);
        }
            elseif ($user && in_array("ROLE_SOCIETE", $user->getRoles())){
            yield MenuItem::linkToCrud('Entreprises', 'fas fa-list',Company::class);
            yield MenuItem::linkToCrud('offers', 'fas fa-list',Offer::class);

            }

        yield MenuItem::linkToCrud('jobs', 'fas fa-list',Jobs::class);
    }

}
