<?php

namespace App\Business\Handle\Exception;

use Throwable;
use Symfony\Component\HttpFoundation\Response;

class AccessDeniedHandle extends ExceptionHandleAbstract
{
    /**
     * @param Throwable $exception
     * @return array
     */
    public function traitContent(Throwable $exception): array
    {
        return [
            'message' => $exception->getMessage(),
        ];
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return Response::HTTP_NETWORK_AUTHENTICATION_REQUIRED;
    }
}
