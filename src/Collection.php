<?php

declare(strict_types=1);

namespace MySaasPackage\Type;

use ArrayIterator;
use Countable;
use MySaasPackage\Type\Internal\Arrayable;

readonly class Collection implements Countable, Arrayable
{
    public function __construct(protected array $items = [])
    {
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function add(mixed $item): self
    {
        $this->items[] = $item;

        return $this;
    }

    public function remove(mixed $item): self
    {
        $key = array_search($item, $this->items, strict: true);

        if (false === $key) {
            return $this;
        }

        unset($this->items[$key]);

        return $this;
    }

    public function contains(mixed $item): bool
    {
        return in_array($item, $this->items, true);
    }

    public function first(): mixed
    {
        return reset($this->items);
    }

    public function last(): mixed
    {
        return end($this->items);
    }

    public function isEmpty(): bool
    {
        return [] === $this->items;
    }

    public function clear(): self
    {
        $this->items = [];

        return $this;
    }

    public function getIterator(): iterable
    {
        return new ArrayIterator($this->items);
    }

    public function map(callable $callback): self
    {
        return new self(array_map($callback, $this->items));
    }

    public function filter(callable $callback): self
    {
        return new self(array_filter($this->items, $callback));
    }

    public function sort(callable $callback): self
    {
        $items = $this->items;
        usort($items, $callback);

        return new self($items);
    }

    public function merge(self $collection): self
    {
        return new self(array_merge($this->items, $collection->__toArray()));
    }

    public function __toArray(): array
    {
        return $this->items;
    }
}
