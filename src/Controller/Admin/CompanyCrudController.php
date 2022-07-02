<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\User;
use App\Form\CompanyType;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FieldCollection;
use EasyCorp\Bundle\EasyAdminBundle\Collection\FilterCollection;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Dto\EntityDto;
use EasyCorp\Bundle\EasyAdminBundle\Dto\SearchDto;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ColorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Translation\TranslatableMessage;

class CompanyCrudController extends AbstractCrudController
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
        return Company::class;
    }

    public function createIndexQueryBuilder(SearchDto $searchDto, EntityDto $entityDto, FieldCollection $fields, FilterCollection $filters): QueryBuilder
    {
        $queryBuilder = parent::createIndexQueryBuilder($searchDto, $entityDto, $fields, $filters);

        if ($this->isGranted('ROLE_ADMIN')) {
            return $queryBuilder;
        }

        $queryBuilder
            ->andWhere('entity.user = :idUser')
            ->setParameter('idUser', $this->getUser());

        return $queryBuilder;
    }

    public function configureFields(string $pageName): iterable
    {
// si je suis administrateur je vois le champ user sinon non
        return [
            AssociationField::new('user')
                ->setPermission('ROLE_ADMIN'),
            'name',
            UrlField::new('logo'),
            ColorField::new('logoBackground'),
            'position',
            UrlField::new('website'),
        ];
    }
     // le bouton add réservé à l'admin
    public function configureActions(Actions $actions): Actions
    {
        $company = $this->doctrine->getRepository(Company::class)->findOneByUser($this->getUser());
        if ($company) {
            $actions->setPermission(Action::NEW, 'ROLE_ADMIN');
        }

        $actions->setPermission(Action::SAVE_AND_ADD_ANOTHER, 'ROLE_ADMIN');
        $actions->add(Crud::PAGE_INDEX, Action::DETAIL);

        return $actions;
    }
     // choisir un utilisateur pour la sorciété en tant que admin
    public function createEntity(string $entityFqcn)
    {
        if ($this->isGranted('ROLE_ADMIN')) {
            return parent::createEntity($entityFqcn);
        }

        $company = new Company();
        $user = $this->getUser();
        if ($user instanceof User) {
            $company->setUser($user);
        }

        return $company;
    }
}
