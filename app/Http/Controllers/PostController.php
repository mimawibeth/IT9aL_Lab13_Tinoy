<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => Auth::id(),
        ]);

        return redirect('/posts')->with('success', 'Post created!');
    }

    public function show(string $id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('posts.show', ['post' => $post]);
    }

    public function edit(string $id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);

        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $post->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect('/posts')->with('success', 'Post updated!');
    }

    public function destroy(string $id)
    {
        $post = Post::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $post->delete();

        return redirect('/posts')->with('success', 'Post deleted!');
    }
}
