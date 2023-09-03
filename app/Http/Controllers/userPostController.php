<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userPostController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('User.index', compact('users'));
    }
}
