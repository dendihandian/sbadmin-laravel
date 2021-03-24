<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\RoleManagementController;
use App\Http\Controllers\Admin\UserManagementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminHomeController::class, 'dashboard'])->name('dashboard');

    // User Management
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('index'); // admin.users.index
        Route::post('/', [UserManagementController::class, 'store'])->name('store'); // admin.users.store
        Route::get('/create', [UserManagementController::class, 'create'])->name('create'); // admin.users.create
        Route::get('/datatable', [UserManagementController::class, 'datatable'])->name('datatable'); // admin.users.datatable

        Route::prefix('{userId}')->group(function () {
            Route::get('/', [UserManagementController::class, 'show'])->name('show'); // admin.users.show
            Route::patch('/', [UserManagementController::class, 'update'])->name('update'); // admin.users.update
            Route::delete('/', [UserManagementController::class, 'delete'])->name('delete'); // admin.users.delete
            Route::get('/edit', [UserManagementController::class, 'edit'])->name('edit'); // admin.users.edit
        });
    });

    // Role Management
    Route::prefix('roles')->name('roles.')->group(function () {
        Route::get('/', [RoleManagementController::class, 'index'])->name('index'); // admin.roles.index
        Route::post('/', [RoleManagementController::class, 'store'])->name('store'); // admin.roles.store
        Route::get('/create', [RoleManagementController::class, 'create'])->name('create'); // admin.roles.create
        Route::get('/datatable', [RoleManagementController::class, 'datatable'])->name('datatable'); // admin.roles.datatable

        Route::prefix('{roleId}')->middleware(['find_role'])->group(function () {
            Route::get('/', [RoleManagementController::class, 'show'])->name('show'); // admin.roles.show
            Route::patch('/', [RoleManagementController::class, 'update'])->name('update'); // admin.roles.update
            Route::delete('/', [RoleManagementController::class, 'delete'])->name('delete'); // admin.roles.delete
            Route::get('/edit', [RoleManagementController::class, 'edit'])->name('edit'); // admin.roles.edit
        });
    });
});
