<?php

declare(strict_types = 1);

namespace Aggrego\EventStore\Api;

use Aggrego\EventStore\Aggregate;

interface Storage
{
    public function pushAggregate(Aggregate $aggregate): void;
}
