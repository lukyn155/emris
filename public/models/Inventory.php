<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'inventory')]
class Inventory {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int|null $id = null;

    #[ORM\Column(type: 'integer')]
    private int $quantity = 0;

    #[ORM\Column(type: 'integer')]
    private int $quantityReservated = 0;

    #[ORM\Column(type: 'integer')]
    private int $quantityBorrowed = 0;

    #[ORM\Column(type: 'string')]
    private string $sector;

    #[ORM\Column(type: 'string')]
    private string $state;

    public function getId(): int {
        return $this->id;
    }
    
    #[ORM\OneToOne(targetEntity: Material::class, inversedBy: 'inventory')]
    private Material $material;

    public function getQuantity(): int {
        return $this->quantity - $this->quantityReservated - $this->quantityReservated;
    }

    public function getQuantityReservated(): int {
        return $this->quantity;
    }

    public function getQuantityBorrowed(): string {
        return $this->sector;
    }

    public function getSector(): string {
        return $this->sector;
    }

    public function setQuantity(int $quantity): void {
        $this->quantity = $quantity;
    }

    public function setQuantityReservated(int $quantityReservated): void {
        $this->quantityReservated = $quantityReservated;
    }

    public function setQuantityBorrowed(int $quantityBorrowed): void {
        $this->quantityBorrowed = $quantityBorrowed;
    }

    public function setSector(string $sector): void {
        $this->sector = $sector;
    }

}
