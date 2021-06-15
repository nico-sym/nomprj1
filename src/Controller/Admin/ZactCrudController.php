<?php

namespace App\Controller\Admin;

use App\Entity\Zact;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ZactCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Zact::class;
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
