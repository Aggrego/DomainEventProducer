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

namespace Aggrego\AggregateEventConsumer\Shared;

use Aggrego\AggregateEventConsumer\Event as EventInterface;
use Aggrego\AggregateEventConsumer\Event\CreatedAt;
use Aggrego\AggregateEventConsumer\Event\Name;
use Aggrego\AggregateEventConsumer\Event\Version;
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
