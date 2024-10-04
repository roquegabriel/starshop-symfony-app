<?php

namespace App\Controller;

use App\Model\Starship;
use App\Repository\StarshipRepository;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/starships')]
class StarshipApiController extends AbstractController
{
    #[Route(path: '', methods: ['GET'])]
    public function getCollection(StarshipRepository $repository): Response
    {

        $myShips = $repository->findAll();
        return $this->json(['starships' => $myShips], 200);
    }

    #[Route(path: '/{id<\d+>}', methods: ['GET'])]
    public function get(int $id, StarshipRepository $starshipRepository): Response
    {
        $starship = $starshipRepository->find($id);

        if (!$starship) {
            throw $this->createNotFoundException('Starship not found');
        }

        return $this->json($starship);
    }
}
