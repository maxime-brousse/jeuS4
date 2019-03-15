<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @ORM\ManyToOne(targetEntity="App\Entity\parties", inversedBy="partie_j1")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user_speudo;

    /**
     * @ORM\Column(type="text")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $user_email;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $user_date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $user_derniere;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_win;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $user_loose;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserSpeudo(): ?string
    {
        return $this->user_speudo;
    }

    public function setUserSpeudo(string $user_speudo): self
    {
        $this->user_speudo = $user_speudo;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->user_speudo;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = json_decode($this->roles);
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = json_encode($roles);

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUserEmail(): ?string
    {
        return $this->user_email;
    }

    public function setUserEmail(string $user_email): self
    {
        $this->user_email = $user_email;

        return $this;
    }

    public function getUserDate(): ?\DateTimeInterface
    {
        return $this->user_date;
    }

    public function setUserDate(?\DateTimeInterface $user_date): self
    {
        $this->user_date = $user_date;

        return $this;
    }

    public function setUser(string $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getUserDerniere(): ?\DateTimeInterface
    {
        return $this->user_derniere;
    }

    public function setUserDerniere(?\DateTimeInterface $user_derniere): self
    {
        $this->user_derniere = $user_derniere;

        return $this;
    }

    public function getUserWin(): ?int
    {
        return $this->user_win;
    }

    public function setUserWin(?int $user_win): self
    {
        $this->user_win = $user_win;

        return $this;
    }

    public function getUserLoose(): ?int
    {
        return $this->user_loose;
    }

    public function setUserLoose(?int $user_loose): self
    {
        $this->user_loose = $user_loose;

        return $this;
    }
}
