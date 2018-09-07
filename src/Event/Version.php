<?php

declare(strict_types = 1);

namespace Aggrego\EventStore\Event;

use TimiTao\ValueObject\Utils\StringValueObject;

class Version extends StringValueObject
{
    public function __construct(string $value)
    {
        parent::__construct(self::class, $value);
    }
}
