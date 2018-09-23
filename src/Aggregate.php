<?php

declare(strict_types = 1);

namespace Aggrego\AggregateEventConsumer;

interface Aggregate
{
    public function getUuid(): Uuid;

    public function pullEvents(): Events;
}
