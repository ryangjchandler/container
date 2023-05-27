<?php

namespace RyanChandler\Container;

use Psr\Container\ContainerInterface;
use RyanChandler\Container\Exceptions\ServiceNotFoundException;

class Container implements ContainerInterface
{
    protected array $bindings = [];

    public function bind(string $id, object $service): void
    {
        $this->bindings[$id] = $service;
    }

    public function get(string $id): mixed
    {
        if (! $this->has($id)) {
            throw new ServiceNotFoundException($id);
        }

        return $this->bindings[$id];
    }

    public function has(string $id): bool
    {
        return isset($this->bindings[$id]);
    }
}