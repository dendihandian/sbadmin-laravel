<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Http\Request;
use App\Models\Role;

class FindRoleMiddleware
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
        $roleId = $request->roleId ?? null;

        if (!$role = Role::find($roleId)) {
            abort(404);
        }

        $request = $request->merge([
            'role' => $role
        ]);

        return $next($request);
    }
}
