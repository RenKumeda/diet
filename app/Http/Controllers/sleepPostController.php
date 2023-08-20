<?php

namespace App\Http\Controllers;

use App\Models\Sleep;
use Illuminate\Http\Request;

class sleepPostController extends Controller
{
    public function index(Sleep $sleep)
    {
        return view('Sleep.index')->with(['sleeps' => $sleep->getPaginateByLimit()]);
    }
    
    public function show(Sleep $sleep)
    {
        return view('Sleep.show')->with(['sleep' => $sleep]);
    }
}
