<?php

/*
 * Toto je POUZE!!! příklad bohaté entity, 
 * která by neměla být nastavená tak, 
 * že bude mít pouze getry a setry, 
 * ale spíš nějaké funkce reprezentující chování domény,
 * které budou nějak ovlivňovat danou entitu
 * 
 * Entity by měly měnit svůj stav na základě nějaké validace předávaných dat,
 * jinak by nebyly validní, k tomu se používají DTO objekty, které jsou
 * vytvořené pouze pro přenos dat nikoli logiku
 *  */

// src/User.php

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
    private int|null $id = null;

    #[ORM\Column(type: 'string')]
    private string $name;

    /** @var Collection<int, Bug> An ArrayCollection of Bug objects. */
    #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: 'reporter')]
    private Collection $reportedBugs;

    /** @var Collection<int,Bug> An ArrayCollection of Bug objects. */
    #[ORM\OneToMany(targetEntity: Bug::class, mappedBy: 'engineer')]
    private $assignedBugs;

    public function addReportedBug(Bug $bug): void
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug(Bug $bug): void
    {
        $this->assignedBugs[] = $bug;
    }
    
    public function __construct()
    {
        $this->reportedBugs = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    public function getId(): int|null
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}