<?php

namespace App\MessageHandler;

use App\Message\KingsMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class KingsMessageHandler implements MessageHandlerInterface
{
    public function __invoke(KingsMessage $message): void
    {
        dump([
            'firstname' => $message->getFirstname(),
            'lastname' => $message->getLastname(),
            'courtesyTitle' => $message->getCourtesyTitle(),
            'positionStartYear' => $message->getPositionStartYear(),
            'positionEndYear' => $message->getPositionEndYear(),
        ]);
    }
}
