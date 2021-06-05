<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'delete']);
    }
    public function index()
    {
        $posts = Post::latest()->with(['user', 'likes'])->paginate(20);
        return view('posts.index', ['posts' => $posts]);
    }
    public function show(Post $post)
    {
        return view('posts.post', ['post' => $post]);
    }
    public function store(Request $request)
    {
        $this->validate($request, ['body' => 'required']);
        $request->user()->posts()->create($request->only('body'));
        return back();
    }
    public function delete(Post $post, Request $request)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }
}
