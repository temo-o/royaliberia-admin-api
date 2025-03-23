<?php

namespace App\EventListener;

use PHPUnit\Util\Json;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
class ExceptionListener
{

    private LoggerInterface $logger;
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        $message = sprintf("Error occured: %s", $exception->getMessage());

        $rr = get_class($exception);
        $response = new JsonResponse(["exceptionType" =>$rr, "errorMessage" => $exception->getMessage()]);
        $this->logger->info($message);

        $event->setResponse($response);

    }
}