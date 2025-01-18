<?php
// src/Entity/Produkt.php

namespace App\Entity;

use App\Repository\ProduktRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: ProduktRepository::class)]
class Produkt{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $cislo_produktu;

    #[ORM\Column(length: 255)]
    private string $nazev;

    #[ORM\Column]
    private int $cena;

    #[ORM\OneToMany(targetEntity: Sklad::class, mappedBy: 'produkt')]
    private $polozky;

    public function __construct(){
        $this->polozky = new ArrayCollection();
    }

    public function getPolozky(): Collection{
        return $this->polozky;
    }

    public function addPolozka(Polozka $polozka){
        $this->polozka->add($polozka);
    }

    public function removePolozka(Polozka $polozka){
        $this->polozka->remove($polozka);
    }
    
    public function getId(): ?int{
        return $this->id;
    }

    public function getCisloProduktu(): ?int{
        return $this->cislo_produktu;
    }
    
    public function getNazev(): ?string{
        return $this->nazev;
    }

    public function getCena(): ?int{
        return $this->cena;
    }

    public function setId(int $id): void{
        $this->id= $id;
    }

    public function setCisloProduktu(int $cislo_produktu): void{
        $this->cislo_produktu= $cislo_produktu;
    }
    
    public function setNazev(string $nazev): void{
        $this->nazev = $nazev;
    }
    
    public function setCena(int $cena): void{
        $this->cena = $cena;
    }
}