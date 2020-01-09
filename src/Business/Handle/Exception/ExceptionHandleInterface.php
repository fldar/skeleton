<?php

namespace App\Business\Handle\Exception;

use Throwable;
use Symfony\Component\HttpFoundation\Response;

interface ExceptionHandleInterface
{
    /**
     * @param Throwable $exception
     * @return Response
     */
    public function handle(Throwable $exception): Response;

    /**
     * @param Throwable $exception
     * @return array
     */
    public function traitContent(Throwable $exception): array;

    /**
     * @return int
     */
    public function getStatusCode(): int;
}
