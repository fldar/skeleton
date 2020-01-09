<?php

namespace App\Business\Handle\Exception;

use Throwable;
use Symfony\Component\HttpFoundation\Response;

class AccessDeniedHandle extends ExceptionHandleAbstract
{
    /** @var string  */
    private const MESSAGE = 'Your user does not have permission to access this functionality.';

    /**
     * @param Throwable $exception
     * @return array
     */
    public function traitContent(Throwable $exception): array
    {
        return [
            'message' => self::MESSAGE,
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
