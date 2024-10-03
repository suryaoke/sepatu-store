<?php

use App\Http\Middleware\FrontendAuth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up'
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'auth_masyarakat' => FrontendAuth::class,
        ]);
    })
    // Inside your Application setup
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle NotFoundHttpException (404)
        $exceptions->render(function (NotFoundHttpException $e, Request $request) {
            return response()->view('error.index', [
                'code' => 404,
                'message' => 'Oops. This page has gone missing.'
            ], 404);
        });

        // Handle HttpException for 403 errors
        $exceptions->render(function (HttpException $e, Request $request) {
            if ($e->getStatusCode() === 403) {
                return response()->view('error.index', [
                    'code' => 403,
                    'message' => 'You do not have permission to access this resource.'
                ], 403);
            }
            // Default response for other HTTP errors
            return response()->view('error.index', [
                'code' => $e->getStatusCode(),
                'message' => 'An unexpected error occurred.'
            ], $e->getStatusCode());
        });
    })

    ->create();
