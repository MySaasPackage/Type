<?php

declare(strict_types=1);

namespace MySaasPackage\Support;

use Stringable;
use JsonSerializable;

readonly class Hash implements Stringable, Rawable, JsonSerializable
{
    public function __construct(
        protected string $raw
    ) {
    }

    public function isNotValid(string $password): bool
    {
        return !$this->isValid($password);
    }

    public function isValid(string $password): bool
    {
        return password_verify($password, $this->raw);
    }

    public function jsonSerialize(): string
    {
        return $this->raw;
    }

    public function __toRaw(): mixed
    {
        return $this->raw;
    }

    public function __toString(): string
    {
        return $this->raw;
    }
}
