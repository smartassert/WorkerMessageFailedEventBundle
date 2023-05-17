<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

interface ExceptionHandlerInterface
{
    public function handle(\Throwable $throwable): void;
}
