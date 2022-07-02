<?php

namespace App\Controller\Admin;

use App\Entity\Offer;
use Doctrine\Persistence\ManagerRegistry;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OfferCrudController extends AbstractCrudController
{
    private ManagerRegistry $doctrine;

    /**
     * @param ManagerRegistry $doctrine
     */
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public static function getEntityFqcn(): string
    {
        return Offer::class;
    }
    public function configureActions(Actions $actions): Actions
    {
       // $offer = $this->doctrine->getRepository(Offer::class)->findOneByUser($this->getUser());
      //  if ($offer) {
       //     $actions->setPermission(Action::NEW, 'ROLE_ADMIN');
       // }

        return $actions->disable(Action::NEW, Action::EDIT);
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}


