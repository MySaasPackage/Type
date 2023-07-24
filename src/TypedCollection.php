<?php

declare(strict_types=1);

namespace MySaasPackage\Type;

use InvalidArgumentException;

abstract readonly class TypedCollection extends Collection
{
    public function __construct(
        protected string $type,
        protected array $items = []
    ) {
        parent::__construct($items);
        $this->type = $type;
    }

    protected function guardType($item): void
    {
        if (!is_a($item, $this->type, true)) {
            throw new InvalidArgumentException(sprintf('Item must be of type %s', $this->type));
        }
    }

    public function add($item): self
    {
        $this->guardType($item);

        return parent::add($item);
    }

    public function remove($item): self
    {
        $this->guardType($item);

        return parent::remove($item);
    }

    public function contains($item): bool
    {
        $this->guardType($item);

        return parent::contains($item);
    }
}
