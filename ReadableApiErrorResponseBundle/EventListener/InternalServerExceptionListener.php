<?php


namespace Exception\ReadableApiErrorResponseBundle\EventListener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class InternalServerExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        if (0 === $exception->getCode()
            ||
            500 === $exception->getCode()
        ) {
            $response = new Response(json_encode(['error' => [
                'message' => $exception->getMessage(),
            ]]), 500);

            $event->setResponse($response);
        }
    }
}