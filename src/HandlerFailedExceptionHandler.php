<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

use Symfony\Component\Messenger\Exception\HandlerFailedException;

class HandlerFailedExceptionHandler implements ExceptionHandlerInterface
{
    /**
     * @param iterable<ExceptionHandlerInterface> $handlers
     */
    public function __construct(
        private readonly iterable $handlers,
    ) {
    }

    public function handle(\Throwable $throwable): void
    {
        if (!$throwable instanceof HandlerFailedException) {
            return;
        }

        foreach ($throwable->getNestedExceptions() as $nestedException) {
            foreach ($this->handlers as $handler) {
                $handler->handle($nestedException);
            }
        }
    }
}
