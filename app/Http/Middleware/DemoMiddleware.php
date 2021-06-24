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

        if ($demo === true && !$request->isMethod('GET')) {
            $request->session()->flash('warning', __('Any mutation and transaction is disabled. Please ask me for requesting the demo to : contact.dendi@yahoo.com'));
            return redirect()->back();
        }

        return $next($request);
    }
}
