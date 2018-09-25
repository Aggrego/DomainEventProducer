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
