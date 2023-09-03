<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class postPostController extends Controller
{
    public function index(Post $post)
    {
        return view('Post.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    
    public function create()
    {
        return view('Post.create');
    }
    
    public function store(Post $post, Request $request)
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts');
    }
    
    public function show(Post $post)
    {
        return view('Post.show')->with(['post' => $post]);
    }
    
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts');
    }
}
