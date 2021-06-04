<?php

namespace App\EventSubscriber;

use App\Entity\User;
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
        ];
    }

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
        $user = $this->security->getUser();
        //$entity->setUser($user);
    }
}