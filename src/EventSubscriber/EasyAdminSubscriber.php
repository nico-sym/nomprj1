<?php

namespace App\EventSubscriber;

use App\Entity\User;
use App\Entity\Zgrp;
use App\Entity\Zgru;
use App\Entity\Zper;
use App\Entity\Zite;
use App\Entity\Zact;
use DateTime;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;

class EasyAdminSubscriber implements EventSubscriberInterface
{
    private $slugger;
    private $security;

    public function __construct(SluggerInterface $slugger, Security $security)
    {
        $this->slugger = $slugger;
        $this->security = $security;
    }

    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['setUserSlugAndZgru'],
            BeforeEntityPersistedEvent::class => ['setZgruAndUser'],
            BeforeEntityPersistedEvent::class => ['setZgrpAndZgru'],
            BeforeEntityPersistedEvent::class => ['setZperAndZgrp'],
            BeforeEntityPersistedEvent::class => ['setZperAndZact'],
            BeforeEntityPersistedEvent::class => ['setZperAndZite'],
        ];
    }

    //User----------------------------------------------------------------
    public function setUserSlugAndZgru(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();
        
        if (!($entity instanceof User)) {
            return;
        }
        $roles[] = 'ROLE_USER';
        $slug = $this->slugger->slug($entity->getName());
        $entity->setSlug($slug);

        $date = new DateTime();
        $entity->setPassword('password');
        $entity->setCreatedAt($date);
        $entity->setRoles($roles);
        $entity->setSlug($slug);
    }

    //Zgru-User-----------------------------------------------------------
    public function setZgruAndUser(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Zgru)) {
            return;
        }
        
        $usr = $this->security->getUser();
        $entity->setUser($usr);
        
    }

    //Zgru-Zgrp-----------------------------------------------------------
    public function setZgruAndZgrp(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Zgru)) {
            return;
        }
        
        $grp = $this->security->getGrp();
        $entity->setGrp($grp);
    }

    //Zgrp----------------------------------------------------------------
    public function setZgrpAndZgru(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Zgrp)) {
            return;
        }
        
        $gru = $this->security->getGru();
        $entity->setGru($gru);
    }

    //Zper-Zact----------------------------------------------------------
    public function setZperAndZact(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Zper)) {
            return;
        }
        
        $act = $this->security->getAct();
        $entity->setAct($act);
    }

    //Zper-Zite-----------------------------------------------------------
    public function setZperAndZite(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Zper)) {
            return;
        }
        
        $ite = $this->security->getIte();
        $entity->setIte($ite);
    }

    //Zper-Zgrp---------------------------------------------------------------
    public function setZperAndZgrp(BeforeEntityPersistedEvent $event)
    {
        $entity = $event->getEntityInstance();

        if (!($entity instanceof Zper)) {
            return;
        }
        
        $grp = $this->security->getGrp();
        $entity->setGrp($grp);
    }
}