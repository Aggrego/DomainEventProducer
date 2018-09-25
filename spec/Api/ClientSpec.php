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

namespace spec\Aggrego\AggregateEventConsumer\Api;

use Aggrego\AggregateEventConsumer\Aggregate;
use Aggrego\AggregateEventConsumer\Api\Client;
use Aggrego\AggregateEventConsumer\Events;
use Aggrego\AggregateEventConsumer\Uuid;
use PhpSpec\ObjectBehavior;

class ClientSpec extends ObjectBehavior
{
    function let(\Aggrego\EventConsumer\Api\Client $client)
    {
        $this->beConstructedWith($client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Client::class);
    }

    function it_should_push_aggregate(Aggregate $aggregate)
    {
        $aggregate->getUuid()->willReturn(new Uuid('43add66e-2bd5-41fd-a886-14b8e790e6b1'));
        $aggregate->pullEvents()->willReturn(new Events());
        $this->pushAggregate($aggregate)->shouldBeNull();
    }
}
