<?php

namespace App\Http\Controllers;

use App\Models\Weight;
use Illuminate\Http\Request;

class weightPostController extends Controller
{
    public function index(Weight $weight)
    {
        return view('Weight.index')->with(['weights' => $weight->getPaginateByLimit()]);
    }
}
