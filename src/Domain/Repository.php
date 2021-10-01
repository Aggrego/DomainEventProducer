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

namespace Aggrego\DomainEventProducer\Domain;

use Aggrego\Domain\Board\Board;
use Aggrego\Domain\Board\Exception\BoardExistException;
use Aggrego\Domain\Board\Exception\BoardNotFoundException;
use Aggrego\Domain\Board\Repository as DomainRepository;
use Aggrego\Domain\Board\Uuid;
use Aggrego\EventConsumer\Shared\Events;

class Repository implements DomainRepository
{
    /**
     * @var DomainRepository
     */
    private $repository;

    /**
     * @var Uuid[]
     */
    private $modified = [];

    public function __construct(DomainRepository $repository)
    {
        $this->modified = [];
        $this->repository = $repository;
    }

    /**
     * @param  Uuid $uuid
     * @return Board
     * @throws BoardNotFoundException
     */
    public function getBoardByUuid(Uuid $uuid): Board
    {
        $board = $this->repository->getBoardByUuid($uuid);
        $this->modified[] = $uuid;
        return $board;
    }

    /**
     * @param  Board $board
     * @throws BoardExistException
     */
    public function addBoard(Board $board): void
    {
        $this->repository->addBoard($board);
        $this->modified[] = $board->getId();
    }

    public function pullEvents(): Events
    {
        $events = new Events();
        foreach ($this->modified as $uuid) {
            foreach ($this->repository->getBoardByUuid($uuid)->pullEvents() as $event) {
                $events->add($event);
            }
        }
        $this->modified = [];
        return $events;
    }
}
