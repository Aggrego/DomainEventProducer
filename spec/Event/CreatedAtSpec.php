<?php

namespace spec\Aggrego\AggregateEventConsumer\Event;

use Aggrego\AggregateEventConsumer\Event\CreatedAt;
use DateTimeImmutable;
use PhpSpec\ObjectBehavior;

class CreatedAtSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(new DateTimeImmutable());
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(CreatedAt::class);
    }

    function it_should_have_value()
    {
        $this->getValue()->shouldBeString();
    }
}
