<?php

namespace App\Controller\Admin;

use App\Entity\Zper;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ZperCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Zper::class;
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
