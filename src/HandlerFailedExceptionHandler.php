<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Exception\HandlerFailedException;

readonly class HandlerFailedExceptionHandler implements ExceptionHandlerInterface
{
    /**
     * @param iterable<ExceptionHandlerInterface> $handlers
     */
    public function __construct(
        public iterable $handlers,
    ) {
    }

    public function handle(Envelope $envelope, \Throwable $throwable): void
    {
        if (!$throwable instanceof HandlerFailedException) {
            return;
        }

        foreach ($throwable->getNestedExceptions() as $nestedException) {
            foreach ($this->handlers as $handler) {
                $handler->handle($envelope, $nestedException);
            }
        }
    }
}
