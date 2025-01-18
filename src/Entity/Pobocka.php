<?php
// src/Entity/Pobocka.php

namespace App\Entity;

use App\Repository\PobockaRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: PobockaRepository::class)]

class Pobocka{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $cislo_popisne;

    #[ORM\Column(length: 255)]
    private string $ulice;

    #[ORM\Column(length: 255)]
    private string $mesto;

    #[ORM\Column(length: 255)]
    private string $kod_zeme;

    #[ORM\Column(length: 255)]
    private string $jmeno_vedouciho;

    #[ORM\OneToMany(targetEntity: Zamestnanec::class, mappedBy: 'pobocka')]
    private $zamestnanci;

    public function __construct(){
        $this->zamestnanci = new ArrayCollection();
    }

    public function getZamestnanci(): Collection{
        return $this->zamestnanci;
    }

    public function addZamestnanec(Zamestnanec $zamestnanec){
        $this->zamestnanci->add($zamestnanec);
    }

    public function removeZamestnanec(Zamestnanec $zamestnanec){
        $this->zamestnanci->remove($zamestnanec);
    }

    public function getId(): ?int{
        return $this->id;
    }

    public function getCisloPopisne(): ?int{
        return $this->cislo_popisne;
    }
    
    public function getUlice(): ?string{
        return $this->ulice;
    }

    public function getMesto(): ?string{
        return $this->mesto;
    }

    public function getKodZeme(): ?string{
        return $this->kod_zeme;
    }

    public function getJmenoVedouciho(): ?string{
        return $this->jmeno_vedouciho;
    }

    public function setIdPobocka(int $id): void{
        $this->id= $id;
    }

    public function setCisloPopisne(int $cislo_popisne): void{
        $this->cislo_popisne = $cislo_popisne;

    }

    public function setUlice(string $ulice): void{
        $this->ulice = $ulice;

    }

    public function setMesto(string $mesto): void{
        $this->mesto = $mesto;

    }

    public function setKodZeme(string $kod_zeme): void{
        $this->kod_zeme = $kod_zeme;
    }

    public function setJmenoVedouciho(string $jmeno_vedouciho): void{
        $this->jmeno_vedouciho = $jmeno_vedouciho;
    }

}