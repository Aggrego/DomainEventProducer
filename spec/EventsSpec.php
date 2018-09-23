<?php

namespace spec\Aggrego\AggregateEventConsumer;

use Aggrego\AggregateEventConsumer\Event;
use Aggrego\AggregateEventConsumer\Events;
use IteratorAggregate;
use PhpSpec\ObjectBehavior;

class EventsSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Events::class);
        $this->shouldHaveType(IteratorAggregate::class);
    }

    function it_should_add_event(Event $event)
    {
        $this->add($event)->shouldBeNull();
    }
}
