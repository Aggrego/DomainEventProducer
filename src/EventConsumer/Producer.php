<?php
/**
 *
 * This file is part of the Aggrego.
 * (c) Tomasz Kunicki <kunicki.tomasz@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

declare(strict_types = 1);

namespace Aggrego\DomainEventProducer\EventConsumer;

use Aggrego\DomainEventProducer\Domain\Repository;
use Aggrego\EventConsumer\Client;

class Producer
{
    /**
     * @var Repository
     */
    private $repository;

    /**
     * @var Client
     */
    private $eventConsumer;

    public function __construct(Repository $repository, Client $eventConsumer)
    {
        $this->repository = $repository;
        $this->eventConsumer = $eventConsumer;
    }

    public function publish(): void
    {
        foreach ($this->repository->pullEvents() as $event) {
            $this->eventConsumer->consume($event);
        }
    }
}
