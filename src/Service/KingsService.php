<?php

namespace App\Service;

use App\DTO\AddKingsRequestDTO;
use App\Factory\PersonFactory;
use App\Repository\KingsRepository;
use App\Service\Redis\Cache\KingsCacheService;
use Exception;
use Psr\Cache\InvalidArgumentException;

class KingsService
{
    public function __construct(
        protected KingsRepository   $kingsRepository,
        protected KingsCacheService $kingsCacheService,
        protected PersonFactory $personFactory
    )
    {
    }

    /**
     * @throws Exception
     */
    public function getKings(): array
    {
        return $this->kingsRepository->getKingsByDate();
    }

    /**
     * @throws InvalidArgumentException
     */
    public function getKingsFromRedis(): mixed
    {
        return $this->kingsCacheService->getKing('');
    }

    /**
     * @throws Exception
     */
    public function getKingsClosure(): array
    {
        $rawResults = $this->kingsRepository->getKingsClosure();
        $finalResults = array();

        foreach ($rawResults as $result) {
            $finalResults[] = array(
                "person" => $result[0],
                "depth" => $result['depth']
            );
        }
        return $finalResults;
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setKingsInRedis(string $id, string $name): void
    {
        $this->kingsCacheService->setKing($id, $name);
    }

    public function addKings(AddKingsRequestDTO $addKingsRequestDTO): void
    {
        $kings = $addKingsRequestDTO->kings;

        foreach ($kings as $king){
            $person = $this->personFactory->createFromDto($king);
            $this->kingsRepository->store($person);
        }
    }
}