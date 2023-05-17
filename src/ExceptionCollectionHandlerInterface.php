<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

interface ExceptionCollectionHandlerInterface
{
    /**
     * @param \Throwable[] $exceptions
     */
    public function handle(array $exceptions): void;
}
