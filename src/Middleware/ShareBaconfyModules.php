<?php

namespace Baconfy\Interface\Middleware;

use Baconfy\Core\ModuleRegistry;
use Closure;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShareBaconfyModules
{
    /**
     * Handles the incoming HTTP request and shares data with the Inertia.js frontend.
     */
    public function handle(Request $request, Closure $next): mixed
    {
        Inertia::share('baconfy', [
            'modules' => app(ModuleRegistry::class)->visibleFor($request->user())->map->toArray($request->user())->all(),
        ]);

        return $next($request);
    }
}
