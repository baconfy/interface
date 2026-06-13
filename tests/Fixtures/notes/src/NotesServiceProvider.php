<?php

declare(strict_types=1);

namespace Baconfy\Interface\Tests\Fixtures\Notes;

use Baconfy\Core\ModuleProvider;

class NotesServiceProvider extends ModuleProvider
{
    public function name(): string
    {
        return 'notes';
    }

    public function label(): string
    {
        return 'Notes';
    }

    public function icon(): string
    {
        return 'notebook-pen';
    }
}
