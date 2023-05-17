<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class WorkerMessageFailedEventBundle extends AbstractBundle
{
    public const HANDLER_TAG = 'smartassert.worker_message_failed_event_bundle.message_failure_handler.exception_handler';

    /**
     * @param array<mixed> $config
     */
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        parent::loadExtension($config, $container, $builder);

        $container->import('../config/services.yaml');
        $builder->registerForAutoconfiguration(ExceptionHandlerInterface::class)
            ->addTag(self::HANDLER_TAG)
        ;
    }
}
