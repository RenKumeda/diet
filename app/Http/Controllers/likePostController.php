<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class likePostController extends Controller
{
    public function store($postId)
    {
        Auth::user()->like($postId);
        return 'ok!';
    }
    
    public function destroy($postId)
    {
        Auth::user()->unlike($postId);
        return 'ok!';
    }
}
