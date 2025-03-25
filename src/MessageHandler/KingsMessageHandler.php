<?php

namespace App\MessageHandler;

use App\Entity\Person;
use App\Message\KingsMessage;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class KingsMessageHandler
{
    private LoggerInterface $logger;
    private EntityManagerInterface $entityManager;

    public function __construct(LoggerInterface $logger, EntityManagerInterface $entityManager)
    {
        $this->logger = $logger;
        $this->entityManager = $entityManager;
    }

    public function __invoke(KingsMessage $message): void
    {
        $person = $this->entityManager->getRepository(Person::class)->find($message->personId);

        $this->logger->info('Handling KingsMessage', [
            'firstname' =>$person->getFirstName(),
        ]);
    }
}
