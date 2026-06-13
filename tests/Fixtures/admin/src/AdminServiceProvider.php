<?php

declare(strict_types=1);

namespace Baconfy\Interface\Tests\Fixtures\Admin;

use Baconfy\Core\ModuleProvider;

class AdminServiceProvider extends ModuleProvider
{
    public function name(): string
    {
        return 'admin';
    }

    public function label(): string
    {
        return 'Admin';
    }

    public function icon(): string
    {
        return 'shield';
    }
}
