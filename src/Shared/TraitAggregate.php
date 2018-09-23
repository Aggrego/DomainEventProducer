<?php

declare(strict_types = 1);

namespace Aggrego\AggregateEventConsumer\Shared;

use Aggrego\AggregateEventConsumer\Event;
use Aggrego\AggregateEventConsumer\Events;

/**
 * Trait TraitAggregate
 * @see \Aggrego\AggregateEventConsumer\Aggregate
 */
trait TraitAggregate
{
    /** @var Events */
    protected $events;

    private function initEvents(): void
    {
        if (is_null($this->events)) {
            $this->events = new Events();
        }
    }

    public function pullEvents(): Events
    {
        $this->initEvents();
        return $this->events;
    }

    protected function pushEvent(Event $event): void
    {
        $this->initEvents();
        $this->events->add($event);
    }
}
