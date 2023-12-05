<?php

declare(strict_types=1);

namespace SmartAssert\WorkerMessageFailedEventBundle\Tests\Functional;

use PHPUnit\Framework\TestCase;
use SmartAssert\WorkerMessageFailedEventBundle\WorkerMessageFailedEventHandler;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerTest extends TestCase
{
    private ContainerInterface $container;

    protected function setUp(): void
    {
        parent::setUp();

        $kernel = new TestingKernel('test', true);
        $kernel->boot();

        $this->container = $kernel->getContainer();
    }

    /**
     * @dataProvider serviceExistsInContainerDataProvider
     *
     * @param class-string $id
     */
    public function testServiceExistsInContainer(string $id): void
    {
        self::assertInstanceOf($id, $this->container->get($id));
    }

    /**
     * @return array<mixed>
     */
    public static function serviceExistsInContainerDataProvider(): array
    {
        return [
            WorkerMessageFailedEventHandler::class => [
                'id' => WorkerMessageFailedEventHandler::class,
            ],
        ];
    }
}
