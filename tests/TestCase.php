<?php

declare(strict_types=1);

namespace Baconfy\Interface\Tests;

use Baconfy\Core\CoreServiceProvider;
use Baconfy\Interface\InterfaceServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            CoreServiceProvider::class,
            InterfaceServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('app.key', 'base64:'.base64_encode(random_bytes(32)));
    }
}
