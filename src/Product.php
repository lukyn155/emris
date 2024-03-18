<?php

/*

ORM nepoužívá žádné žádné uživatelsky definované funkce ani konstruktor, takže můžu vytvářet co chci
 * 
 * Aby Doctrine věděl, jak pracovat s danými prvky je nutné definovat použitím anotací nebo XML souborem

*/

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'products')]
class Product
{
    #[ORM\Id]
    #[ORM\Column(type: 'integer')]
    #[ORM\GeneratedValue]
    private int|null $id = null;
    #[ORM\Column(type: 'string')]
    private string $name;
    
    function getId() {
        return $this->id;
    }


    function setName($name) {
        $this->name = $name;
    }
    
    function getName() {
        return $this->name;
    }
}
