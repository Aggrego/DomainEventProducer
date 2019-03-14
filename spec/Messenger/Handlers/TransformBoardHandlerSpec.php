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

namespace spec\Aggrego\DomainEventProducer\Messenger\Handlers;

use Aggrego\Domain\Api\Command\TransformBoard\UseCase;
use Aggrego\DomainEventProducer\Domain\Repository;
use Aggrego\DomainEventProducer\Messenger\Handlers\TransformBoardHandler;
use Aggrego\EventConsumer\Client;
use PhpSpec\ObjectBehavior;

class TransformBoardHandlerSpec extends ObjectBehavior
{
    function let(UseCase $useCase, Repository $repository, Client $client)
    {
        $this->beConstructedWith($useCase, $repository, $client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(TransformBoardHandler::class);
    }
}
