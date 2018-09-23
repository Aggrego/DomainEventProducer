<?php

declare(strict_types = 1);

namespace Aggrego\AggregateEventConsumer\Api;

use Aggrego\AggregateEventConsumer\Aggregate;
use Aggrego\EventConsumer\Api\Client;
use Aggrego\EventConsumer\Event\CreatedAt;
use Aggrego\EventConsumer\Event\Domain;
use Aggrego\EventConsumer\Event\Version;
use Aggrego\EventConsumer\Shared\Event;

class Storage
{
    /** @var Client */
    private $eventConsumer;

    public function __construct(Client $eventConsumer)
    {
        $this->eventConsumer = $eventConsumer;
    }

    public function pushAggregate(Aggregate $aggregate): void
    {
        $aggregateUuid = $aggregate->getUuid();
        /** @var \Aggrego\AggregateEventConsumer\Event $event */
        foreach ($aggregate->pullEvents() as $event) {
            $consumerEvent = new Event(
                Domain::fromParts(
                    get_class($aggregate),
                    $aggregateUuid->getValue()
                ),
                new CreatedAt($event->createdAt()->getDateTime()),
                new Version($event->getVersion()->getValue()),
                $event->getPayload()
            );

            if ($this->eventConsumer->isSupported($consumerEvent)) {
                $this->eventConsumer->consume($consumerEvent);
            }
        }
    }

}
