<?php

use RyanChandler\Container\Container;
use RyanChandler\Container\Exceptions\ServiceNotFoundException;

it('can be constructed', function () {
    expect(new Container)->toBeInstanceOf(Container::class);
});

it('can bind and retrieve services', function () {
    $container = new Container;
    $container->bind('container', $container);

    expect($container->has('container'))->toBeTrue();
    expect($container->get('container'))->toBeInstanceOf(Container::class)->toBe($container);
});

it('throws a ServiceNotFoundException when trying to retrieve a non-existent service', function () {
    $container = new Container;

    expect(fn () => $container->get('foo'))
        ->toThrow(ServiceNotFoundException::class);
});