<?php

namespace App\Business\Handle\Exception;

use Throwable;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class ExceptionHandleAbstract implements ExceptionHandleInterface
{
    /**
     * @param Throwable $exception
     * @return Response
     */
    public function handle(Throwable $exception): Response
    {
        $response = new JsonResponse($this->traitContent($exception));
        $response->setStatusCode($this->getStatusCode());

        return $response;
    }

    /**
     * @param Throwable $exception
     * @return array
     */
    public function traitContent(Throwable $exception): array
    {
        return [
            'message' => $exception->getMessage(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine()
        ];
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return Response::HTTP_BAD_REQUEST;
    }
}
