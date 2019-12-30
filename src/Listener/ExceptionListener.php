<?php

namespace App\Listener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

/**
 * @package App\Listener
 */
class ExceptionListener
{
    /**
     * @param ExceptionEvent $event
     */
    public function onKernelException(ExceptionEvent $event): void
    {
        $response = new JsonResponse($this->traitContent($event->getThrowable()));
        $response->setStatusCode(Response::HTTP_BAD_REQUEST);
        $event->setResponse($response);
    }

    /**
     * @param \Throwable $exception
     * @return array
     */
    private function traitContent(\Throwable $exception): array
    {
        return [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine()
        ];
    }
}
