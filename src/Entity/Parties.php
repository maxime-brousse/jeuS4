<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartiesRepository")
 */
class Parties
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $partie_statut;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $partie_tourde;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $partie_de;

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $partie_terrain;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $partie_typeV;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="user_speudo")
     */
    private $partie_j1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $partie_j2;

    public function __construct()
    {
        $this->partie_j1 = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPartieStatut(): ?bool
    {
        return $this->partie_statut;
    }

    public function setPartieStatut(bool $partie_statut): self
    {
        $this->partie_statut = $partie_statut;

        return $this;
    }

    public function getPartieTourde(): ?bool
    {
        return $this->partie_tourde;
    }

    public function setPartieTourde(?bool $partie_tourde): self
    {
        $this->partie_tourde = $partie_tourde;

        return $this;
    }

    public function getPartieDe()
    {
        return $this->partie_de;
    }

    public function setPartieDe($partie_de): self
    {
        $this->partie_de = $partie_de;

        return $this;
    }

    public function getPartieTerrain()
    {
        return $this->partie_terrain;
    }

    public function setPartieTerrain($partie_terrain): self
    {
        $this->partie_terrain = $partie_terrain;

        return $this;
    }

    public function getPartieTypeV(): ?string
    {
        return $this->partie_typeV;
    }

    public function setPartieTypeV(?string $partie_typeV): self
    {
        $this->partie_typeV = $partie_typeV;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getPartieJ1(): Collection
    {
        return $this->partie_j1;
    }

    public function addPartieJ1(User $partieJ1): self
    {
        if (!$this->partie_j1->contains($partieJ1)) {
            $this->partie_j1[] = $partieJ1;
            $partieJ1->setUserSpeudo($this);
        }

        return $this;
    }

    public function removePartieJ1(User $partieJ1): self
    {
        if ($this->partie_j1->contains($partieJ1)) {
            $this->partie_j1->removeElement($partieJ1);
            // set the owning side to null (unless already changed)
            if ($partieJ1->getUserSpeudo() === $this) {
                $partieJ1->setUserSpeudo(null);
            }
        }

        return $this;
    }

    public function getPartieJ2(): ?string
    {
        return $this->partie_j2;
    }

    public function setPartieJ2(?string $partie_j2): self
    {
        $this->partie_j2 = $partie_j2;

        return $this;
    }
}
