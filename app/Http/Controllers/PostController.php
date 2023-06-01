<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Str;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::latest()->paginate(),
        ]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return back();
    }

    public function create(Post $post)
    {
        return view('post.create', ['post' => $post]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'body' => 'required',
        ]);

        $post = $request->user()->posts()->create(
            [
                'title' => $request->title,
                'slug' => $request->slug,
                'body' => $request->body,
            ]
        );
        return redirect()->route('posts.edit', $post);
    }

    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => "required|unique:posts,slug,$post->id",
            'body' => 'required',
        ]);

        $post->update(
            [
                'title' => $request->title,
                'slug' => $request->slug,
                'body' => $request->body,
            ]
        );
        return redirect()->route('posts.edit', $post);
    }
}
