<?php

namespace App\Controller\Admin;

use App\Entity\Zgru;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;

class ZgruCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Zgru::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            
        ];
    }
    
}
