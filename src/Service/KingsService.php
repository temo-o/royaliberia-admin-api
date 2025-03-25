<?php

namespace App\Service;

use App\DTO\AddKingsRequestDTO;
use App\Factory\PersonFactory;
use App\Message\KingsMessage;
use App\Repository\KingsRepository;
use App\Service\Redis\Cache\KingsCacheService;
use Exception;
use Psr\Cache\InvalidArgumentException;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\ExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\TransportNamesStamp;

class KingsService
{
    public function __construct(
        protected KingsRepository   $kingsRepository,
        protected KingsCacheService $kingsCacheService,
        protected PersonFactory $personFactory,
        protected MessageBusInterface $messageBus,
        protected LoggerInterface $logger
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

        // Todo: Instead of kings, receive personIds
        foreach ($kings as $king){
            $person = $this->personFactory->createFromDto($king);
            $message = new KingsMessage(1);

            try {
                $this->messageBus->dispatch($message);
            } catch (\Throwable $e) {
                $this->logger->error('Dispatch failed: ' . $e->getMessage());
            }
        }
    }
}