<?php

declare(strict_types=1);

namespace Baconfy\Interface;

use Baconfy\Interface\Middleware\ShareBaconfyModules;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Registers a new component or service within the system.
     */
    public function register(): void {}

    /**
     * Initializes and prepares the application or system components for use.
     */
    public function boot(Kernel $kernel): void
    {
        $kernel->appendMiddlewareToGroup('web', ShareBaconfyModules::class);
    }
}
