<?php

declare(strict_types=1);

namespace MySaasPackage\Support;

interface Integerable
{
    public function __toInt(): int;
}
