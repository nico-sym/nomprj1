<?php

namespace App\Entity;

use App\Repository\ZgrpRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZgrpRepository::class)
 */
class Zgrp
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nam;

    /**
     * @ORM\OneToMany(targetEntity=Zgru::class, mappedBy="grp")
     */
    private $gru;

    /**
     * @ORM\OneToMany(targetEntity=Zper::class, mappedBy="grp")
     */
    private $per;

    public function __construct()
    {
        $this->gru = new ArrayCollection();
        $this->per = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNam(): ?string
    {
        return $this->nam;
    }

    public function setNam(string $nam): self
    {
        $this->nam = $nam;

        return $this;
    }

    /**
     * @return Collection|Zgru[]
     */
    public function getGru(): Collection
    {
        return $this->gru;
    }

    public function addGru(Zgru $gru): self
    {
        if (!$this->gru->contains($gru)) {
            $this->gru[] = $gru;
            $gru->setGrp($this);
        }

        return $this;
    }

    public function removeGru(Zgru $gru): self
    {
        if ($this->gru->removeElement($gru)) {
            // set the owning side to null (unless already changed)
            if ($gru->getGrp() === $this) {
                $gru->setGrp(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Zper[]
     */
    public function getPer(): Collection
    {
        return $this->per;
    }

    public function addPer(Zper $per): self
    {
        if (!$this->per->contains($per)) {
            $this->per[] = $per;
            $per->setGrp($this);
        }

        return $this;
    }

    public function removePer(Zper $per): self
    {
        if ($this->per->removeElement($per)) {
            // set the owning side to null (unless already changed)
            if ($per->getGrp() === $this) {
                $per->setGrp(null);
            }
        }

        return $this;
    }

}