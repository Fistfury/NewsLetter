<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $middleware = [
        // Global HTTP middleware stack.
    ];

    protected $middlewareGroups = [
        'web' => [
            // The "web" middleware group
        ],

        'api' => [
            // The "api" middleware group
        ],
    ];

    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'ensureiscustomer' => \App\Http\Middleware\EnsureIsCustomer::class,
        'ensureissubscriber' => \App\Http\Middleware\EnsureIsSubscriber::class,
        // other middleware...
    ];
}