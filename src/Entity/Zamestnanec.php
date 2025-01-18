<?php
// src/Entity/Zamestnanec.php

namespace App\Entity;

use App\Repository\ZamestnanecRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ZamestnanecRepository::class)]

class Zamestnanec{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $jmeno;
    
    #[ORM\Column(length: 255)]
    private string $prijmeni;

    #[ORM\ManyToOne(targetEntity: Pobocka::class, inversedBy: 'zamestnanci')]
    private $pobocka;

    public function getId(): ?int{
        return $this->id;
    }

    public function getJmeno(): ?string{
        return $this->jmeno;
    }

    public function getPrijmeni(): ?string{
        return $this->prijmeni;
    }

    public function getPobocka(): ?Pobocka{
        return $this->pobocka;
    }

    public function setId(int $id): void{
        $this->id= $id;
    }

    public function setJmeno(string $jmeno): void{
        $this->jmeno = $jmeno;
    }

    public function setPrijmeni(string $prijmeni): void{
        $this->prijmeni = $prijmeni;
    }

    public function setPobocka(?Pobocka $pobocka): self{
        $this->pobocka = $pobocka;
        return $this;
    }
}