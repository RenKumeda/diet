<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class followPostController extends Controller
{
    public function store()
    {
        Auth::user()->follows()->attach($followerId);
        return;
    }
    
    public function destroy($followerId)
    {
        Auth::user()->follows()->detach($followerId);
        return;
    }
}
