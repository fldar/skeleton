<?php

namespace App\Listener;

use App\Business\Handle\Exception\ExceptionHandle;
use App\Business\Handle\Exception\AccessDeniedHandle;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

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
        $exception = $event->getThrowable();
        $response = null;

        switch ($exception) {
            case $exception instanceof AccessDeniedException:
                $response = (new AccessDeniedHandle())->handle($exception);
                break;
            default:
                $response = (new ExceptionHandle())->handle($exception);
                break;
        }

        $event->setResponse($response);
    }
}
