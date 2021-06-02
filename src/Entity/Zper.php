<?php

namespace App\Entity;

use App\Repository\ZperRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZperRepository::class)
 */
class Zper
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Zite::class, inversedBy="per")
     */
    private $ite;

    /**
     * @ORM\ManyToOne(targetEntity=Zact::class, inversedBy="per")
     * @ORM\JoinColumn(nullable=false)
     */
    private $act;

    /**
     * @ORM\ManyToOne(targetEntity=Zgrp::class, inversedBy="per")
     */
    private $grp;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIte(): ?Zite
    {
        return $this->ite;
    }

    public function setIte(?Zite $ite): self
    {
        $this->ite = $ite;

        return $this;
    }

    public function getAct(): ?Zact
    {
        return $this->act;
    }

    public function setAct(?Zact $act): self
    {
        $this->act = $act;

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