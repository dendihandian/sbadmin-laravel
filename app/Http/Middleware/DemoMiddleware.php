<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class DemoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $demo = env('DEMO', false);

        if ($demo === true && in_array($request->method(), ['POST', 'PUT', 'DELETE', 'PATCH'])) {
            $request->session()->flash('warning', __('Any mutation and transaction is disabled. Please ask me for requesting the demo to : contact.dendi@yahoo.com'));
            return redirect()->back();
        }

        return $next($request);
    }
}
