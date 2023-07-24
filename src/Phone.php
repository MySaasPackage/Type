<?php

declare(strict_types=1);

namespace MySaasPackage\Type;

use InvalidArgumentException;
use JsonSerializable;
use MySaasPackage\Type\Internal\Rawable;
use Stringable;

readonly class Phone implements Stringable, Rawable, JsonSerializable
{
    public const REGEX = '/^\+(?:\d){6,14}\d$/';

    public function __construct(
        protected string $raw
    ) {
        if (!(bool) preg_match(self::REGEX, $this->raw)) {
            throw new InvalidArgumentException('The provided value must be a valid phone');
        }
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
