<?php

declare(strict_types = 1);

namespace Aggrego\EventStore;

interface Aggregate
{
    public function pullEvents(): Events;
}
