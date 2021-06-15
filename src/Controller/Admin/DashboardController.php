<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Zgrp;
use App\Entity\Zgru;
use App\Entity\Zper;
use App\Entity\Zact;
use App\Entity\Zite;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        //return parent::index(); $$gn remplacé pour avoir la page du dessous
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Nomprj1');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('User-Utilisateur', 'fas fa-newspaper', User::class);
        yield MenuItem::linkToCrud('Grp-Groupe', 'fas fa-newspaper', Zgrp::class);
        yield MenuItem::linkToCrud('Gru-Groupe Util.', 'fas fa-newspaper', Zgru::class);
        yield MenuItem::linkToCrud('Act-Actions', 'fas fa-newspaper', Zact::class);
        yield MenuItem::linkToCrud('Ite-Item', 'fas fa-newspaper', Zite::class);
        yield MenuItem::linkToCrud('Per-Permissions', 'fas fa-newspaper', Zper::class);
    }
}
