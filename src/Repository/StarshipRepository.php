<?php

namespace App\Repository;

use App\Model\Starship;
use Psr\Log\LoggerInterface;

class StarshipRepository
{

    public function __construct(private LoggerInterface $logger)
    {
        // $this->logger = $logger;
    }

    public function findAll()
    {

        $this->logger->info('Starship collection retrieved from repository');

        return [

            new Starship(
                1,
                'USS LeafyCruiser (NCC-0001)',
                'Garden',
                'Jean-Luc Pickles',
                'taken over by Q'
            ),

            new Starship(
                2,
                'USS Expresso (NCC-1234-C)',
                'Latte',
                'James T. Quick',
                'repaired',
            ),

            new Starship(
                3,
                'USS Wanderlust (NSS-2024-")',
                'Delta Tourist',
                'Kathryn Journeyway',
                'under construction',
            ),
        ];
    }

    public function find(int $id): ?Starship
    {
        foreach ($this->findAll() as $starship) {
            if ($starship->getId() === $id) {
                return $starship;
            }
        }
        return null;
    }
}
