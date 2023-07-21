<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

use Symfony\Component\Messenger\Event\WorkerMessageFailedEvent;

readonly class WorkerMessageFailedEventHandler
{
    /**
     * @param iterable<ExceptionHandlerInterface> $handlers
     */
    public function __construct(
        public iterable $handlers,
    ) {
    }

    public function __invoke(WorkerMessageFailedEvent $event): void
    {
        if ($event->willRetry()) {
            return;
        }

        foreach ($this->handlers as $handler) {
            $handler->handle($event->getThrowable());
        }
    }
}
