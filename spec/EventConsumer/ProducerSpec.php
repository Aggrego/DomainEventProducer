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

namespace spec\Aggrego\DomainEventProducer\EventConsumer;

use Aggrego\DomainEventProducer\Domain\Repository;
use Aggrego\DomainEventProducer\EventConsumer\Producer;
use Aggrego\EventConsumer\Client;
use Aggrego\EventConsumer\Event\CreatedAt;
use Aggrego\EventConsumer\Event\Domain;
use Aggrego\EventConsumer\Event\Name;
use Aggrego\EventConsumer\Event\Version;
use Aggrego\EventConsumer\Shared\Event;
use Aggrego\EventConsumer\Shared\Events;
use DateTimeImmutable;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ProducerSpec extends ObjectBehavior
{
    function let(Repository $repository, Client $client)
    {
        $this->beConstructedWith($repository, $client);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(Producer::class);
    }

    function it_should_publish_events(Repository $repository, Client $client)
    {
        $events = new Events();
        $events->add(
            new Event(
                Domain::fromString('Test:7835a2f1-65c4-4e05-aacf-2e9ed950f5f2'),
                new Name('test'),
                new CreatedAt(new DateTimeImmutable()),
                new Version('1.0.0.0'),
                []
            )
        );
        $repository->pullEvents()->willReturn($events);
        $client->consume(Argument::type(Event::class))->shouldBeCalled();
        $this->beConstructedWith($repository, $client);

        $this->publish()->shouldReturn(null);
    }
}
