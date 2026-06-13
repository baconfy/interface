<?php

declare(strict_types=1);

use Baconfy\Interface\Tests\Fixtures\Notes\NotesServiceProvider;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

it('shares baconfy modules on a real inertia request without app setup', function () {
    $this->app->register(NotesServiceProvider::class);

    Route::middleware('web')->get('/dashboard', fn () => Inertia::render('Dashboard'));

    $response = $this->get('/dashboard', ['X-Inertia' => true]);
    $response->assertOk();

    $props = $response->json('props');
    expect($props)->toHaveKey('baconfy')
        ->and($props['baconfy']['modules'])->toHaveCount(1)
        ->and($props['baconfy']['modules'][0]['name'])->toBe('notes');
});
