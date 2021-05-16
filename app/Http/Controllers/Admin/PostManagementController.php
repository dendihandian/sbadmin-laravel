<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PostManagementController extends AdminBaseController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.posts.index');
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {
        return '-';
    }

    public function show()
    {
        return view('admin.posts.show');
    }

    public function edit()
    {
        return view('admin.posts.edit');
    }

    public function update()
    {
        return '-';
    }

    public function destroy()
    {
        return '-';
    }

    public function datatable()
    {
        $posts = Post::all();
        return DataTables::of($posts)
            ->editColumn('created_at', function ($post) {
                return $post->created_at->format(config('sbadmin.utilities.date_format.php'));
            })
            ->addColumn('action', function ($post) {
                return view('admin.posts._partials.table-action', ['post' => $post]);
            })
            ->make(true);
    }
}
