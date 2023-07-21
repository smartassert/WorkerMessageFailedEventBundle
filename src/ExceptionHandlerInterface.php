<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

use Symfony\Component\Messenger\Envelope;

interface ExceptionHandlerInterface
{
    public function handle(Envelope $envelope, \Throwable $throwable): void;
}
