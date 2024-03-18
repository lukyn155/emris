<?php
// src/Entity/User.php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'users')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int|null $id;
    
    #[ORM\Column(type: 'string')]
    private string $firstName;
    
    #[ORM\Column(type: 'string')]
    private string $lastName;
    
    #[ORM\Column(type: 'string')]
    private string $email;

    #[ORM\Column(type: 'string')]
    private string $login;

    #[ORM\Column(type: 'string')]
    private string $password;
    
    #[ORM\ManyToOne(targetEntity: Role::class, inversedBy: 'assinedUsers')]
    private Role $userRole;
    
    #[ORM\OneToMany(targetEntity: Transaction::class, mappedBy: 'reponsiblePerson')]
    private Collection $inventoryTransactions;
    
    public function __construct() {
        $this->inventoryTransactions = new ArrayCollection();
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;
        return $this;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setPassword(string $password): self
    {
        // Uložení hesla v MD5 hashi
        $this->password = md5($password);
        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}