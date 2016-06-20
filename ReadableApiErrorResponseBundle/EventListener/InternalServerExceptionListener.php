<?php


namespace Zolfa\ReadableApiErrorResponseBundle\EventListener;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class InternalServerExceptionListener
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        $code = 500;
        if ($exception instanceof HttpException) {
            $code = $exception->getStatusCode();
        }

        $response = new Response(json_encode(['error' => [
            'message' => $exception->getMessage(),
        ]]), $code);

        $event->setResponse($response);
    }
}