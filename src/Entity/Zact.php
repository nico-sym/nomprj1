<?php

namespace App\Entity;

use App\Repository\ZactRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZactRepository::class)
 */
class Zact
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
     * @ORM\OneToMany(targetEntity=Zper::class, mappedBy="act", orphanRemoval=true)
     */
    private $per;

    public function __construct()
    {
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
            $per->setAct($this);
        }

        return $this;
    }

    public function removePer(Zper $per): self
    {
        if ($this->per->removeElement($per)) {
            // set the owning side to null (unless already changed)
            if ($per->getAct() === $this) {
                $per->setAct(null);
            }
        }

        return $this;
    }

}