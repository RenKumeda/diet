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
    
    public function store(Weight $weight, Request $request)
    {
        $input = $request['weight'];
        $weight->fill($input)->save();
        return redirect('/weights');
    }
    
    public function show(Weight $weight)
    {
        return view('Weight.show')->with(['weight' => $weight]);
    }
    
    public function delete(Weight $weight)
    {
        $weight->delete();
        return redirect('/weights');
    }

}
