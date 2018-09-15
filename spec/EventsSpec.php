<?php

namespace spec\Aggrego\EventStore;

use Aggrego\EventStore\Event;
use Aggrego\EventStore\Events;
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
