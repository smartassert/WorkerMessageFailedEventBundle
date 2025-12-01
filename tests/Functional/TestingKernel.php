<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle\Tests\Functional;

use SmartAssert\WorkerMessageFailedEventBundle\WorkerMessageFailedEventBundle;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\HttpKernel\Kernel;

class TestingKernel extends Kernel
{
    /**
     * @return BundleInterface[]
     */
    public function registerBundles(): array
    {
        return [
            new WorkerMessageFailedEventBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void {}
}
