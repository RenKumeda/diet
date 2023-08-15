<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class trainingPostController extends Controller
{
     public function index()
    {
        return view('Training.index');
    }
}
