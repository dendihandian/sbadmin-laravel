<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
    }

    public function show(int $userId)
    {
        $user = User::find($userId);
        return view('admin.users.show', compact('user'));
    }

    public function edit(int $userId)
    {
        $user = User::find($userId);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, int $userId)
    {
        $user = User::find($userId);
        $user->update($request->only(['name', 'email', 'password']));

        $user->detachRoles();
        if ($request->has('role') && (int) $request->get('role')) {
            $user->attachRole((int) $request->get('role'));
        }

        $request->session()->flash('success', __('User Updated'));
        return redirect()->back();
    }

    public function delete(Request $request, int $userId)
    {
        User::where('id', $userId)->delete();

        $request->session()->flash('success', __('User Deleted'));
        return redirect()->route('admin.users.index');
    }

    public function datatable()
    {
        $users = User::with('roles')->latest()->get();
        return Datatables::of($users)
            ->make(true);
    }
}
