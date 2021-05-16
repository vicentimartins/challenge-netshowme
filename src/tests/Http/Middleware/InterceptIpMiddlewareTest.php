<?php

namespace Tests\Http\Middleware;

use App\Http\Middleware\InterceptIpMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Request;
use Tests\TestCase;

class InterceptIpMiddlewareTest extends TestCase
{
    use DatabaseMigrations;

    private const UPDATE_SUCCESS = 1;

    public function testIsMiddlewareInterceptingIp()
    {
        $ip = '127.0.0.1';

        $request = new Request();
        $request->merge(['ip' => $ip]);

        $middleware = new InterceptIpMiddleware();
        $middleware->handle(new Request(), function($request) use ($ip) {
            self::assertArrayHasKey('ip', $request->all());
        });
    }
}
