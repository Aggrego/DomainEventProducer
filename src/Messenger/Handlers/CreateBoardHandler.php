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

namespace Aggrego\DomainEventProducer\Messenger\Handlers;

use Aggrego\Domain\Api\Command\CreateBoard\Command;
use Aggrego\Domain\Api\Command\CreateBoard\UseCase;
use Aggrego\DomainEventProducer\Domain\Repository;
use Aggrego\DomainEventProducer\Messenger\Handler;
use Aggrego\EventConsumer\Client;

class CreateBoardHandler extends Handler
{
    /**
     * @var UseCase
     */
    private $useCase;

    public function __construct(UseCase $useCase, Repository $repository, Client $client)
    {
        parent::__construct($repository, $client);
        $this->useCase = $useCase;
    }

    public function handle(Command $command): void
    {
        $this->useCase->handle($command);

        foreach ($this->repository->pullUuids() as $uuid) {
            $this->process($uuid);
        }
    }
}
