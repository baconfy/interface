<?php

declare(strict_types=1);

use Baconfy\Interface\Tests\Fixtures\Admin\AdminServiceProvider;
use Baconfy\Interface\Tests\Fixtures\Notes\NotesServiceProvider;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

it('omits modules the current user cannot see', function () {
    $this->app->register(NotesServiceProvider::class);
    $this->app->register(AdminServiceProvider::class);
    Gate::define('admin', fn (?User $user) => false);

    Route::middleware('web')->get('/dashboard', fn () => Inertia::render('Dashboard'));

    $names = collect($this->get('/dashboard', ['X-Inertia' => true])->json('props.baconfy.modules'))->pluck('name');
    expect($names)->toContain('notes')->and($names)->not->toContain('admin');
});
