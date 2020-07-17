<?php

namespace App\EventSubscriber;

use App\Exception\ResponseExceptionInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class AppExceptionSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => [
                ['processException', 100]
            ]
        ];
    }

    public function processException(ExceptionEvent $event)
    {
        $throwable = $event->getThrowable();

        if ($throwable instanceof ResponseExceptionInterface) {
            $event->setResponse($throwable->getResponse());
        }
    }
}
