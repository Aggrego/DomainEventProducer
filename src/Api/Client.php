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

namespace Aggrego\AggregateEventConsumer\Api;

use Aggrego\AggregateEventConsumer\Aggregate;
use Aggrego\EventConsumer\Api\Client as EventConsumerClient;
use Aggrego\EventConsumer\Event\CreatedAt;
use Aggrego\EventConsumer\Event\Domain;
use Aggrego\EventConsumer\Event\Name;
use Aggrego\EventConsumer\Event\Version;
use Aggrego\EventConsumer\Shared\Event;

class Client
{
    /** @var EventConsumerClient */
    private $eventConsumer;

    public function __construct(EventConsumerClient $eventConsumer)
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
                new Name($event->getName()->getValue()),
                new CreatedAt($event->createdAt()->getDateTime()),
                new Version($event->getVersion()->getValue()),
                $event->getPayload()
            );

            $this->eventConsumer->consume($consumerEvent);
        }
    }
}
