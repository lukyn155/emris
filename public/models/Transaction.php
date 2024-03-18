<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'transactions')]
class Transaction {

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $type;
    
    #[ORM\Column(type: 'datetime')]
    private DateTime $created;
    
    #[ORM\Column(type: 'datetime')]
    private DateTime $datetimeFrom;
    
    #[ORM\Column(type: 'datetime')]
    private DateTime $datetimeTo;
    
    #[ORM\Column(type: 'integer')]
    private int $quantity;
    
    #[ORM\ManyToOne(targetEntity: Material::class, inversedBy: 'transactions')]
    private Material $material;
    
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'inventoryTransactions')]
    private User $reponsiblePerson;

    public function getId(): int {
        return $this->id;
    }

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
