<?php

declare(strict_types = 1);

namespace Aggrego\EventStore;

use Aggrego\EventStore\Event\CreatedAt;
use Aggrego\EventStore\Event\Name;
use Aggrego\EventStore\Event\Version;

interface Event
{
    public function getName(): Name;

    public function createdAt(): CreatedAt;

    public function getVersion(): Version;

    public function getPayload(): array;
}
