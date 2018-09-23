<?php

declare(strict_types = 1);

namespace Aggrego\AggregateEventConsumer;

use Aggrego\AggregateEventConsumer\Event\CreatedAt;
use Aggrego\AggregateEventConsumer\Event\Name;
use Aggrego\AggregateEventConsumer\Event\Version;

interface Event
{
    public function getName(): Name;

    public function createdAt(): CreatedAt;

    public function getVersion(): Version;

    public function getPayload(): array;
}
