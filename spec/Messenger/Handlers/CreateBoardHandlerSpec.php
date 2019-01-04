<?php

namespace spec\Aggrego\DomainEventProducer\Messenger\Handlers;

use Aggrego\Domain\Api\Command\CreateBoard\UseCase;
use Aggrego\DomainEventProducer\Domain\Repository;
use Aggrego\DomainEventProducer\Messenger\Handlers\CreateBoardHandler;
use Aggrego\EventConsumer\Client;
use PhpSpec\ObjectBehavior;

class CreateBoardHandlerSpec extends ObjectBehavior
{
    function let(UseCase $useCase, Repository $repository, Client $client)
    {
        $this->beConstructedWith($useCase, $repository, $client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreateBoardHandler::class);
    }
}
