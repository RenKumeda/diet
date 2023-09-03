<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class commentPostController extends Controller
{
    public function store(Comment $comment, Request $request, Post $post)
    {
        $input = $request['comment'];
        $comment->user_id = \Auth::user()->id;
        $comment->post_id = $post->id;
        $comment->fill($input)->save();
        return redirect('/posts/'.$post->id);
    }
}
