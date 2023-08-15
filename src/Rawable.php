<?php

declare(strict_types=1);

namespace MySaasPackage;

interface Rawable
{
    public function __toRaw(): mixed;
}
