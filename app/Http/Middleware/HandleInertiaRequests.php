<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'canResetPassword' => Route::has('password.request'),
                'user' => $request->user() ? [
                    'name' => $request->user()->name,
                ] : null,
            ],
            'env' => [
                'APP_NAME' => config('app.name'),
                'LARAVEL_VERSION' => Application::VERSION,
                'PHP_VERSION' => PHP_VERSION,
            ],
            'flash' => [
                'status' => fn () => $request->session()->get('status'),
            ],
        ]);
    }
}
