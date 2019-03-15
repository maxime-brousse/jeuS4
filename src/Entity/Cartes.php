<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartesRepository")
 */
class Cartes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $carte_nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $carte_metier;

    /**
     * @ORM\Column(type="integer")
     */
    private $carte_force;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCarteNom(): ?string
    {
        return $this->carte_nom;
    }

    public function setCarteNom(string $carte_nom): self
    {
        $this->carte_nom = $carte_nom;

        return $this;
    }

    public function getCarteMetier(): ?string
    {
        return $this->carte_metier;
    }

    public function setCarteMetier(string $carte_metier): self
    {
        $this->carte_metier = $carte_metier;

        return $this;
    }

    public function getCarteForce(): ?int
    {
        return $this->carte_force;
    }

    public function setCarteForce(int $carte_force): self
    {
        $this->carte_force = $carte_force;

        return $this;
    }
}
