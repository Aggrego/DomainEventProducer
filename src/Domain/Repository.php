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
        $this->clearModified();
        $this->repository = $repository;
    }

    /**
     * @param  Uuid $uuid
     * @return Board
     * @throws BoardNotFoundException
     */
    public function getBoardByUuid(Uuid $uuid): Board
    {
        $this->modified[] = $uuid;
        return $this->repository->getBoardByUuid($uuid);
    }

    /**
     * @param  Board $board
     * @throws BoardExistException
     */
    public function addBoard(Board $board): void
    {
        $this->modified[] = $board->getUuid();
        $this->repository->addBoard($board);
    }

    public function pullUuids(): array
    {
        $uuids = $this->modified;
        $this->clearModified();
        return $uuids;
    }

    private function clearModified(): void
    {
        $this->modified = [];
    }

    public function getOriginRepository(): DomainRepository
    {
        return $this->repository;
    }
}
