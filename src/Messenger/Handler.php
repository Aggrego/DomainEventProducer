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

namespace Aggrego\DomainEventProducer\Messenger;

use Aggrego\Domain\Board\Uuid;
use Aggrego\DomainEventProducer\Domain\Repository;
use Aggrego\EventConsumer\Client;

abstract class Handler
{
    /**
     * @var Repository
     */
    protected $repository;

    /**
     * @var Client
     */
    private $client;

    public function __construct(Repository $repository, Client $client)
    {
        $this->repository = $repository;
        $this->client = $client;
    }

    protected function process(Uuid $uuid): void
    {
        $board = $this->repository->getOriginRepository()->getBoardByUuid($uuid);
        foreach ($board->pullEvents() as $event) {
            $this->client->consume($event);
        }
    }
}
