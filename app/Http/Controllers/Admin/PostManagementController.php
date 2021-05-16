<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostManagementRequest;
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

    public function store(PostManagementRequest $request)
    {
        Post::create($request->only(Post::FILLABLE_FIELDS));

        $request->session()->flash('success', 'Post Created');
        return redirect()->back();
    }

    public function show(Request $request)
    {
        $post = $request->post;
        return view('admin.posts.show', compact('post'));
    }

    public function edit(Request $request)
    {
        $post = $request->post;
        return view('admin.posts.edit', compact('post'));
    }

    public function update(PostManagementRequest $request)
    {
        $post = $request->post;
        $post->update($request->only(Post::FILLABLE_FIELDS));

        $request->session()->flash('success', 'Post Updated');
        return redirect()->back();
    }
    
    public function destroy(Request $request)
    {
        $post = $request->post;
        $post->delete();

        $request->session()->flash('success', 'Post Deleted');
        return redirect()->route('admin.posts.index');
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
