<?php

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
