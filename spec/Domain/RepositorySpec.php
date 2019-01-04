<?php

namespace spec\Aggrego\DomainEventProducer\Domain;

use Aggrego\Domain\Board\Repository as DomainRepository;
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
}
