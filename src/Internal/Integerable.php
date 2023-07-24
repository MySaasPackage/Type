<?php

declare(strict_types=1);

namespace MySaasPackage\Type\Internal;

interface Integerable
{
    public function __toInt(): int;
}
