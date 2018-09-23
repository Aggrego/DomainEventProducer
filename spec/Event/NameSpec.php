<?php

namespace spec\Aggrego\AggregateEventConsumer\Event;

use Aggrego\AggregateEventConsumer\Event\Name;
use InvalidArgumentException;
use PhpSpec\ObjectBehavior;

class NameSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith('test');
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Name::class);
    }

    function it_should_have_value()
    {
        $this->getValue()->shouldBeString();
    }

    function it_should_throw_exception_with_invalid_format()
    {
        $this->beConstructedWith('');
        $this->shouldThrow(InvalidArgumentException::class)->duringInstantiation();
    }
}