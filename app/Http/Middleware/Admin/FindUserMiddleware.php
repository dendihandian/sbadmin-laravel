<?php

namespace App\Http\Middleware\Admin;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class FindUserMiddleware
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
        $userId = $request->userId ?? null;

        if (!$user = User::with('roles')->find($userId)) {
            abort(404);
        }

        $request = $request->merge([
            '_user' => $user // NOTE: $_user used to distinct the $request->user() usage.
        ]);

        return $next($request);
    }
}
