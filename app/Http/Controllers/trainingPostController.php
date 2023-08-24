<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;
use Carbon\Carbon;

class trainingPostController extends Controller
{
     public function index(Training $training)
    {
        return view('Training.index')->with(['trainings' => $training->getPaginateByLimit()]);
    }
    
    public function create()
    {
        return view('Training.create');
    }
    
    public function store(Training $training, Request $request)
    {
        $input = $request['training'];
        $input['time'] = Carbon::createFromFormat('H:i', $input['time'])->format('H:i:s');
        $training->fill($input)->save();
        return redirect('/trainings');
    }
    
    public function show(Training $training)
    {
        return view('Training.show')->with(['training' => $training]);
    }
}
