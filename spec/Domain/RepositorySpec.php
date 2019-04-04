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

namespace spec\Aggrego\DomainEventProducer\Domain;

use Aggrego\Domain\Board\Board;
use Aggrego\Domain\Board\Repository as DomainRepository;
use Aggrego\Domain\Board\Uuid;
use Aggrego\DomainEventProducer\Domain\Repository;
use PhpSpec\ObjectBehavior;

class RepositorySpec extends ObjectBehavior
{
    function let(DomainRepository $repository)
    {
        $this->beConstructedWith($repository);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Repository::class);
        $this->shouldHaveType(DomainRepository::class);
    }

    function it_should_add_board(Board $board)
    {
        $board->getUuid()->willReturn(new Uuid('ff6f8cb0-c57d-11e1-9b21-0800200c9a66'));
        $this->addBoard($board)->shouldReturn(null);
    }

    function it_get_board_by_uuid(DomainRepository $repository, Board $board)
    {
        $repository->getBoardByUuid(new Uuid('ff6f8cb0-c57d-11e1-9b21-0800200c9a66'))->willReturn($board);
        $this->beConstructedWith($repository);

        $this->getBoardByUuid(new Uuid('ff6f8cb0-c57d-11e1-9b21-0800200c9a66'))->shouldBeAnInstanceOf(Board::class);
    }
}
