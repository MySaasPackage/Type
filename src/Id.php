<?php

declare(strict_types=1);

namespace MySaasPackage\Type;

use Stringable;
use JsonSerializable;
use MySaasPackage\Type\Internal\Rawable;
use MySaasPackage\Type\Internal\Integerable;

readonly class Id implements Stringable, Integerable, Rawable, JsonSerializable
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
