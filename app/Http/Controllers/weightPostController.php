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
    
    public function create()
    {
        return view('Weight.create');
    }
    
    public function show(Weight $weight)
    {
        return view('Weight.show')->with(['weight' => $weight]);
    }
}
