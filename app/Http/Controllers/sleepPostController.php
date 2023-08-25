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
    
    public function create()
    {
        return view('Sleep.create');
    }
    
    public function store(Sleep $sleep, Request $request)
    {
        $input = $request['sleep'];
        $sleep->fill($input)->save();
        return redirect('/sleeps');
    }
    
    public function show(Sleep $sleep)
    {
        return view('Sleep.show')->with(['sleep' => $sleep]);
    }
    
    public function delete(Sleep $sleep)
    {
        $sleep->delete();
        return redirect('/sleeps');
    }

}
