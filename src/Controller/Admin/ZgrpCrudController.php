<?php

namespace App\Controller\Admin;

use App\Entity\Zgrp;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ZgrpCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Zgrp::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nam'),
        ];
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
        ->setDefaultSort(['nam' => 'ASC']);
    }
    
}
