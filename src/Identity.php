<?php

declare(strict_types=1);

namespace MySaasPackage;

use Stringable;
use JsonSerializable;

readonly class Identity implements Stringable, Integerable, Rawable, JsonSerializable
{
    public function __construct(
        protected int $raw
    ) {
    }

    public function jsonSerialize(): int
    {
        return $this->raw;
    }

    public function __toRaw(): mixed
    {
        return $this->raw;
    }

    public function __toInt(): int
    {
        return $this->raw;
    }

    public function __toString(): string
    {
        return (string) $this->raw;
    }
}
