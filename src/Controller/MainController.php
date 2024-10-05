<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route(path: '/', name: 'app_homepage', methods: ['GET'])]
    public function homepage(StarshipRepository $starshipRepository)
    {
        $ships = $starshipRepository->findAll();

        $starshipCount = count($ships);

        $myShip = $ships[array_rand($ships)];

        return $this->render('main/homepage.html.twig', [
            'ships' => $ships,
            'myShip' => $myShip,
        ]);
    }
}
