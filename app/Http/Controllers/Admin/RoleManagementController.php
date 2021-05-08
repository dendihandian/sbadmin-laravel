<?php

namespace App\Http\Controllers\Admin;

use App\Exceptions\AdminRoleCannotBeChangedOrRemoved;
use App\Http\Requests\RoleManagementRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class RoleManagementController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();

        View::share('permissions', Permission::all());
    }

    public function index()
    {
        return view('admin.roles.index');
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(RoleManagementRequest $request)
    {
        $role = Role::create($request->only(Role::FILLABLE_FIELDS));

        $role_permissions = array_keys($request->permissions);
        $role->syncPermissions($role_permissions);

        $request->session()->flash('success', __('Role Created'));
        return redirect()->back();
    }

    public function show(Request $request, int $roleId)
    {
        $role = $request->role;
        return view('admin.roles.show', ['role' => $role]);
    }

    public function edit(Request $request, int $roleId)
    {
        $this->checkForAdminRole($request);
        $role = $request->role;

        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(RoleManagementRequest $request, int $roleId)
    {
        $this->checkForAdminRole($request);
        $role = $request->role;

        $role->update($request->only(Role::FILLABLE_FIELDS));

        $role_permissions = array_keys($request->permissions);
        $role->syncPermissions($role_permissions);

        $request->session()->flash('success', __('Role Updated'));
        return redirect()->back();
    }

    public function delete(Request $request, int $roleId)
    {
        $this->checkForAdminRole($request);
        $role = $request->role;

        $role->delete();
        $request->session()->flash('success', __('Role Deleted'));
        return redirect()->back();
    }

    public function datatable()
    {
        $roles = Role::all();
        return DataTables::of($roles)
            ->editColumn('created_at', function ($role) {
                return $role->created_at->format(config('sbadmin.utilities.date_format.php'));
            })
            ->addColumn('action', function ($role) {
                return view('admin.roles._partials.table-action', ['role' => $role]);
            })
            ->make(true);
    }

    private function checkForAdminRole(Request $request)
    {
        $role = $request->role ?? null;

        if (!$role) abort(500);

        if ((string) $role->name === Role::NAME_ADMINISTRATOR) {
            throw new AdminRoleCannotBeChangedOrRemoved();
        }
    }
}
