<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Event\WorkerMessageFailedEvent;

interface ExceptionHandlerInterface
{
    public function handle(Envelope $envelope, \Throwable $throwable, WorkerMessageFailedEvent $event): void;
}
