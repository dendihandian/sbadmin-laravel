<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\Admin\PostManagementController;
use App\Http\Controllers\Admin\RoleManagementController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\UtilitiesController;

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

    Route::get('/', function(){ return redirect()->route('admin.dashboard'); });
    Route::get('/dashboard', [AdminHomeController::class, 'dashboard'])->name('dashboard');

    // User Management
    Route::prefix('users')->name('users.')->middleware(['can:users.browse'])->group(function () {
        Route::get('/', [UserManagementController::class, 'index'])->name('index'); // admin.users.index
        Route::post('/', [UserManagementController::class, 'store'])->name('store')->middleware('can:users.create'); // admin.users.store
        Route::get('/create', [UserManagementController::class, 'create'])->name('create')->middleware('can:users.create'); // admin.users.create
        Route::get('/datatable', [UserManagementController::class, 'datatable'])->name('datatable'); // admin.users.datatable

        Route::prefix('{userId}')->middleware(['find_user'])->group(function () {
            Route::get('/', [UserManagementController::class, 'show'])->name('show'); // admin.users.show
            Route::patch('/', [UserManagementController::class, 'update'])->name('update')->middleware('can:users.edit'); // admin.users.update
            Route::delete('/', [UserManagementController::class, 'destroy'])->name('delete')->middleware('can:users.delete'); // admin.users.delete
            Route::get('/edit', [UserManagementController::class, 'edit'])->name('edit')->middleware('can:users.edit'); // admin.users.edit
        });
    });

    // Role Management
    Route::prefix('roles')->name('roles.')->middleware(['can:roles.browse'])->group(function () {
        Route::get('/', [RoleManagementController::class, 'index'])->name('index'); // admin.roles.index
        Route::post('/', [RoleManagementController::class, 'store'])->name('store')->middleware('can:roles.create'); // admin.roles.store
        Route::get('/create', [RoleManagementController::class, 'create'])->name('create')->middleware('can:roles.create'); // admin.roles.create
        Route::get('/datatable', [RoleManagementController::class, 'datatable'])->name('datatable'); // admin.roles.datatable

        Route::prefix('{roleId}')->middleware(['find_role'])->group(function () {
            Route::get('/', [RoleManagementController::class, 'show'])->name('show'); // admin.roles.show
            Route::patch('/', [RoleManagementController::class, 'update'])->name('update')->middleware('can:roles.edit'); // admin.roles.update
            Route::delete('/', [RoleManagementController::class, 'destroy'])->name('delete')->middleware('can:roles.delete'); // admin.roles.delete
            Route::get('/edit', [RoleManagementController::class, 'edit'])->name('edit')->middleware('can:roles.edit'); // admin.roles.edit
        });
    });

    // Post Management
    Route::prefix('posts')->name('posts.')->middleware(['can:posts.browse'])->group(function () {
        Route::get('/', [PostManagementController::class, 'index'])->name('index'); // admin.posts.index
        Route::post('/', [PostManagementController::class, 'store'])->name('store')->middleware('can:posts.create'); // admin.posts.store
        Route::get('/create', [PostManagementController::class, 'create'])->name('create')->middleware('can:posts.create'); // admin.posts.create
        Route::get('/datatable', [PostManagementController::class, 'datatable'])->name('datatable'); // admin.posts.datatable

        Route::prefix('{postId}')->middleware(['find_post'])->group(function () {
            Route::get('/', [PostManagementController::class, 'show'])->name('show'); // admin.posts.show
            Route::patch('/', [PostManagementController::class, 'update'])->name('update')->middleware('can:posts.edit'); // admin.posts.update
            Route::delete('/', [PostManagementController::class, 'destroy'])->name('delete')->middleware('can:posts.delete'); // admin.posts.delete
            Route::get('/edit', [PostManagementController::class, 'edit'])->name('edit')->middleware('can:posts.edit'); // admin.posts.edit
        });
    });

    Route::prefix('utilities')->name('utilities.')->group(function(){
        Route::post('/sidebar-toggler', [UtilitiesController::class, 'sidebarToggler'])->name('sidebar-toggler'); // admin.utilities.sidebar-toggler
    });

    // File Utilities
    Route::prefix('file')->name('file.')->group(function(){
        Route::post('/', [FileController::class, 'store'])->name('store');
        Route::delete('/', [FileController::class, 'destroy'])->name('delete');
    });
});
