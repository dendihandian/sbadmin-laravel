<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Models\Role;
use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminBaseController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function (Request $request, Closure $next) {

            View::share('currentUrl', $request->url());
            View::share('loggedUser', $request->user());

            return $next($request);
        });
    }

    public function getCachedPermissions()
    {
        if (Cache::has('permissions')) {
            $permissions = Cache::get('permissions');
        } else {
            $permissions = Permission::all();
            Cache::put('permissions', $permissions);
        }

        return $permissions;
    }

    public function getCachedRoleOptions()
    {
        if (Cache::has('roleOptions')) {
            $roleOptions = Cache::get('roleOptions');
        } else {
            $roleOptions = Role::all()->keyBy('name')->transform(function ($role) {
                return $role->display_name ?? $role->name;
            });
            Cache::put('roleOptions', $roleOptions);
        }

        return $roleOptions;
    }
}
