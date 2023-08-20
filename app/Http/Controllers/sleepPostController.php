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
}
