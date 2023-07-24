<?php

declare(strict_types=1);

namespace MySaasPackage\Type;

use JsonSerializable;
use MySaasPackage\Type\Internal\Rawable;
use Stringable;

readonly class Password implements Stringable, Rawable, JsonSerializable
{
    public function __construct(
        protected string $raw
    ) {
    }

    public function toHash(callable $callable): Hash
    {
        return new Hash($callable($this->raw));
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
