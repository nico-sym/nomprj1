<?php

namespace App\Entity;

use App\Repository\ZiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ZiteRepository::class)
 */
class Zite
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
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $men;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $niv;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sq1;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $lie;

    /**
     * @ORM\OneToMany(targetEntity=Zper::class, mappedBy="ite")
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

    public function getMen(): ?string
    {
        return $this->men;
    }

    public function setMen(?string $men): self
    {
        $this->men = $men;

        return $this;
    }

    public function getNiv(): ?int
    {
        return $this->niv;
    }

    public function setNiv(?int $niv): self
    {
        $this->niv = $niv;

        return $this;
    }

    public function getSq1(): ?int
    {
        return $this->sq1;
    }

    public function setSq1(?int $sq1): self
    {
        $this->sq1 = $sq1;

        return $this;
    }

    public function getLie(): ?int
    {
        return $this->lie;
    }

    public function setLie(?int $lie): self
    {
        $this->lie = $lie;

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
            $per->setIte($this);
        }

        return $this;
    }

    public function removePer(Zper $per): self
    {
        if ($this->per->removeElement($per)) {
            // set the owning side to null (unless already changed)
            if ($per->getIte() === $this) {
                $per->setIte(null);
            }
        }

        return $this;
    }

}