<?php

declare(strict_types = 1);

namespace Aggrego\EventStore\Shared;

use Aggrego\EventStore\Event as EventInterface;
use Aggrego\EventStore\Event\CreatedAt;
use Aggrego\EventStore\Event\Name;
use Aggrego\EventStore\Event\Version;
use DateTimeImmutable;

abstract class Event implements EventInterface
{
    private const DEFAULT_VERSION = '1.0.0';

    /** @var array */
    private $payload;

    /** @var Version */
    private $version;

    /** @var CreatedAt */
    private $createdAt;

    public function __construct(array $payload, string $version = self::DEFAULT_VERSION)
    {
        $this->payload = $payload;
        $this->version = new Version($version);
        $this->createdAt = new CreatedAt(new DateTimeImmutable());
    }

    public function getName(): Name
    {
        return new Name(static::class);
    }

    public function getPayload(): array
    {
        return $this->payload;
    }

    public function getVersion(): Version
    {
        return $this->version;
    }

    public function createdAt(): CreatedAt
    {
        return $this->createdAt;
    }
}
