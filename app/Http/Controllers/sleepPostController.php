<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sleepPostController extends Controller
{
    public function index()
    {
        return view('Sleep.index');
    }
}
