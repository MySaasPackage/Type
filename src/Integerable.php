<?php

declare(strict_types=1);

namespace MySaasPackage;

interface Integerable
{
    public function __toInt(): int;
}
