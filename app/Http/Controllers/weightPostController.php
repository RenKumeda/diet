<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class weightPostController extends Controller
{
    public function index()
    {
        return view('Weight.index');
    }
}
