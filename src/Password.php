<?php

declare(strict_types=1);

namespace MySaasPackage;

use Stringable;
use JsonSerializable;

readonly class Password implements Stringable, Rawable, JsonSerializable
{
    public function __construct(
        protected string $raw
    ) {
    }

    public function toHash(callable $callable): PasswordHash
    {
        return new PasswordHash($callable($this->raw));
    }

    public function jsonSerialize(): string
    {
        return $this->raw;
    }

    public function __toRaw(): string
    {
        return $this->raw;
    }

    public function __toString(): string
    {
        return $this->raw;
    }
}
