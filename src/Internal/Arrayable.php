<?php

declare(strict_types=1);

namespace MySaasPackage\Type\Internal;

interface Arrayable
{
    public function __toArray(): array;
}
