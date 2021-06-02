<?php

namespace App\Entity;

use App\Repository\ZgruRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZgruRepository::class)
 */
class Zgru
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="gru")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usr;

    /**
     * @ORM\ManyToOne(targetEntity=Zgrp::class, inversedBy="gru")
     * @ORM\JoinColumn(nullable=false)
     */
    private $grp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsr(): ?User
    {
        return $this->usr;
    }

    public function setUsr(?User $usr): self
    {
        $this->usr = $usr;

        return $this;
    }

    public function getGrp(): ?Zgrp
    {
        return $this->grp;
    }

    public function setGrp(?Zgrp $grp): self
    {
        $this->grp = $grp;

        return $this;
    }
}
