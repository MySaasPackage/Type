<?php

declare(strict_types=1);

namespace MySaasPackage;

interface Arrayable
{
    public function __toArray(): array;
}
