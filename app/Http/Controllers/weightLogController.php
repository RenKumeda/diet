<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weight;

class weightLogController extends Controller
{
    public function show(Weight $weight)
    {
        return view('Weight.log')->with(['weight' =>  $weight->get()]);
    }
}
