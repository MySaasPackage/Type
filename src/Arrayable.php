<?php

declare(strict_types=1);

namespace MySaasPackage\Support;

interface Arrayable
{
    public function __toArray(): array;
}
