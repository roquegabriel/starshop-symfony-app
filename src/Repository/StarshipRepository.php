<?php

namespace App\Repository;

use App\Model\Starship;
use App\Model\StarshipStatusEnum;
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
                'Jean-Luc Picard',
                StarshipStatusEnum::COMPLETED
            ),

            new Starship(
                2,
                'USS Expresso (NCC-1234-C)',
                'Latte',
                'James T. Kirk',
                StarshipStatusEnum::WAITING
            ),

            new Starship(
                3,
                'USS Wanderlust (NSS-2024-W)',
                'Delta Tourist',
                'Kathryn Janeway',
                StarshipStatusEnum::IN_PROGRESS

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
