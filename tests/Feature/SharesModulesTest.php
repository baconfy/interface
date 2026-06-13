<?php

declare(strict_types=1);

use Baconfy\Interface\Middleware\ShareBaconfyModules;
use Illuminate\Http\Request;
use Inertia\Inertia;

it('shares registered modules under the baconfy key', function () {
    $middleware = new ShareBaconfyModules;

    $middleware->handle(Request::create('/'), fn () => response('ok'));

    $shared = Inertia::getShared('baconfy');

    expect($shared)->toHaveKey('modules')->and($shared['modules'])->toBeArray();
});
