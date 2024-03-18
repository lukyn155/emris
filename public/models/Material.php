<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'materials')]
class Material {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int|null $id = null;
    
    #[ORM\Column(type: 'string')]
    private string $name;
    
    /* Zkusit udělat jako Enum */
    #[ORM\Column(type: 'string')]
    private string $type;
    
    #[ORM\OneToMany(targetEntity: Transaction::class, mappedBy: 'material')]
    private Collection $transactions;
    
    #[ORM\OneToOne(targetEntity: Inventory::class, mappedBy: 'material')]
    private Inventory $inventory;
    
    public function __construct() {
        $this->transactions = new ArrayCollection();
    }
    
    public function getId(): int|null
    {
        return $this->id;
    }
    public function getName(): string
    {
        return $this->name;
    }
    public function getType(): string
    {
        return $this->type;
    }
    
    public function setId(string $id): void
    {
        $this->id = $id;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }
    public function setType(string $type) {
        $this->type = $type;
    }
}
