<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\RoleManagementRequest;
use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoleManagementController extends AdminBaseController
{
    protected $roleModel;

    public function __construct(Role $roleModel)
    {
        parent::__construct();

        $this->roleModel = $roleModel;
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
        $this->roleModel->create($request->only($this->roleModel->getFillable()));

        $request->session()->flash('success', __('Role Created'));
        return redirect()->back();
    }

    public function show(int $roleId)
    {
        $role = Role::find($roleId);
        return view('admin.roles.show', ['role' => $role]);
    }

    public function edit(int $roleId)
    {
        $role = Role::find($roleId);
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(RoleManagementRequest $request, int $roleId)
    {
        $request->role->update($request->only($this->roleModel->getFillable()));

        $request->session()->flash('success', __('Role Updated'));
        return redirect()->back();
    }

    public function delete(Request $request, int $roleId)
    {
        $request->role->delete();
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
}
