<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

class WorkerMessageFailedEventBundle extends AbstractBundle
{
    public const EXCEPTION_HANDLER_TAG =
        'smartassert.worker_message_failed_event_bundle.message_failure_handler.exception_handler';

    public const EXCEPTION_COLLECTION_HANDLER_TAG = 'smartassert.worker_message_failed_event_bundle.exception_collection_handler';

    /**
     * @param array<mixed> $config
     */
    public function loadExtension(array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
    {
        parent::loadExtension($config, $container, $builder);

        $container->import('../config/services.yaml');

        $builder->registerForAutoconfiguration(ExceptionHandlerInterface::class)
            ->addTag(self::EXCEPTION_HANDLER_TAG)
        ;

        $builder->registerForAutoconfiguration(ExceptionCollectionHandlerInterface::class)
            ->addTag(self::EXCEPTION_COLLECTION_HANDLER_TAG)
        ;
    }
}
