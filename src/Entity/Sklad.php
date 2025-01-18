<?php
// src/Entity/Sklad.php

namespace App\Entity;

use App\Repository\SkladRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SkladRepository::class)]
class Sklad{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private int $cislo_skladu;

    #[ORM\Column]
    private int $cislo_regalu;

    #[ORM\Column]
    private int $patro_regalu;

    #[ORM\Column(type: date)]
    private $datum_naskladneni;

    #[ORM\ManyToOne(targetEntity: Produkt::class, inversedBy: 'polozky')]
    private $produkt;

    public function getId(): ?int{
        return $this->id;
    }

    public function getCisloSkladu(): ?int{
        return $this->cisloSkladu;
    }

    public function getCisloRegalu(): ?int{
        return $this->cisloRegalu;
    }

    public function getPatroRegalu(): ?int{
        return $this->patroRegalu;
    }

    public function getDatumNaskladneni(): ?DateTime{
        return $this->datumNaskladneni;
    }

    public function getProdukt(): ?Produkt{
        return $this->produkt;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setCisloSkladu(int $cislo_skladu): void{
        $this->cislo_skladu = $cislo_skladu;
    }

    public function setCisloRegalu(int $cislo_regalu): void{
        $this->cislo_regalu = $cislo_regalu;
    }

    public function setPatroRegalu(int $patro_regalu): void{
        $this->patro_regalu = $patro_regalu;
    }

    public function setProdukt(?Produkt $produkt): self{
        $this->produkt = $produkt;
        return $this;
    }
}