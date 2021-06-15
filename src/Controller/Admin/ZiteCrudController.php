<?php

namespace App\Controller\Admin;

use App\Entity\Zite;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ZiteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Zite::class;
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
