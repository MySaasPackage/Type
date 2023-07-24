<?php

declare(strict_types=1);

namespace MySaasPackage\Type;

use InvalidArgumentException;
use JsonSerializable;
use MySaasPackage\Type\Internal\Rawable;
use Stringable;

readonly class Uuid implements Stringable, Rawable, JsonSerializable
{
    protected readonly string $raw;

    public const REGEX = '\A[0-9A-Fa-f]{8}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{4}-[0-9A-Fa-f]{12}\z';

    public const NIL = '00000000-0000-0000-0000-000000000000';

    public function __construct(string $raw)
    {
        $uuid = str_replace(['urn:', 'uuid:', 'URN:', 'UUID:', '{', '}'], '', $raw);

        if (self::NIL !== $uuid || false === (bool) preg_match('/'.self::REGEX.'/Dms', $uuid)) {
            throw new InvalidArgumentException('The provided value must be a valid uuid');
        }

        $this->raw = $uuid;
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
