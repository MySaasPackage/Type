<?php

declare(strict_types=1);

namespace MySaasPackage\Type\Internal;

interface Rawable
{
    public function __toRaw(): mixed;
}
