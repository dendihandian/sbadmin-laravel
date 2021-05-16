<?php

namespace App\Http\Middleware\Admin;

use App\Models\Post;
use Closure;
use Illuminate\Http\Request;

class FindPostMiddleware
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
        $postId = $request->postId ?? null;

        if (!$post = Post::find($postId)) {
            abort(404);
        }

        $request = $request->merge([
            'post' => $post
        ]);

        return $next($request);
    }
}
