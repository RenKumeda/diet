<?php

namespace App\Http\Controllers;

use App\Models\Training;
use Illuminate\Http\Request;

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
    
    public function show(Training $training)
    {
        return view('Training.show')->with(['training' => $training]);
    }
}
