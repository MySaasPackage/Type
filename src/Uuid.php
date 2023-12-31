<?php

declare(strict_types=1);

namespace MySaasPackage;

use Stringable;
use JsonSerializable;
use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

readonly class Uuid implements Stringable, Rawable, JsonSerializable
{
    protected readonly string $raw;

    public const REGEX = '{^[0-9a-f]{8}(?:-[0-9a-f]{4}){3}-[0-9a-f]{12}$}Di';

    public const NIL = '00000000-0000-0000-0000-000000000000';

    public function __construct(string $raw)
    {
        $uuid = str_replace(['urn:', 'uuid:', 'URN:', 'UUID:', '{', '}'], '', $raw);

        if (self::NIL !== $uuid && false === (bool) preg_match(self::REGEX, $uuid)) {
            throw new InvalidArgumentException('The provided value must be a valid uuid');
        }

        $this->raw = $uuid;
    }

    public static function generate(): self
    {
        return new self(RamseyUuid::uuid4()->toString());
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
