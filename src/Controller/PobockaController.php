<?php
// src/Controller/PobockaController.php
namespace App\Controller;

use App\Entity\Pobocka;

use Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PobockaController extends AbstractController{

    #[Route('/pobocka', name:'create_pobocka')]
    public function createPobocka(ManagerRegistry $doctrine): Response{
        $entityManager = $doctrine->getManager();

        $pobocka = new Pobocka();
        
        $pobocka->setCisloPopisne(558);

        $pobocka->setUlice('Looserova');

        $pobocka->setMesto('Praha');

        $pobocka->setKodZeme('CZ');

        $pobocka->setJmenoVedouciho('Karel');

        $entityManager->persist($pobocka);

        $entityManager->flush();

        return new Response('Saved new product with id ' . $pobocka->getId());
    }
}