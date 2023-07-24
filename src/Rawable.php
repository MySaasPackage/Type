<?php

declare(strict_types=1);

namespace MySaasPackage\Support;

interface Rawable
{
    public function __toRaw(): mixed;
}
