<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'roles')]
class Role {

    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;
    
    #[ORM\Column(type: 'boolean')]
    private bool $inventoryReserving;
    
    #[ORM\Column(type: 'boolean')]
    private bool $inventoryEditing;
    
    #[ORM\Column(type: 'boolean')]
    private bool $inventoryReporting;
    
    #[ORM\Column(type: 'boolean')]
    private bool $inventoryIncome;
    
    #[ORM\Column(type: 'boolean')]
    private bool $inventoryDispensing;
    
    #[ORM\OneToMany(targetEntity: User::class, mappedBy: 'userRole')]
    private Collection $assinedUsers;
    
    public function __construct() {
        $this->assinedUsers = new ArrayCollection();
    }
    
    public function getName(): string {
        return $this->name;
    }
    public function getInventoryReserving(): bool {
        return $this->inventoryReserving;
    }
    public function getInventoryEditing(): bool {
        return $this->inventoryEditing;
    }
    public function getInventoryReporting(): bool {
        return $this->inventoryReporting;
    }
    
    public function setName(string $name): void {
        $this->name = $name;
    }
    public function setInventoryReserving(bool $reserve): void {
        $this->inventoryReserving = $reserve;
    }
    public function setInventoryEditing(bool $edit): void {
        $this->inventoryEditing = $edit;
    }
    public function setInventoryReporting(bool $report): void {
        $this->inventoryReporting = $report;
    }
}
