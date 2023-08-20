<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class mealPostController extends Controller
{
    public function index(Meal $meal)
    {
        return view('Meal.index')->with(['meals' => $meal->getPaginateByLimit()]);
    }
    
    public function show(Meal $meal)
    {
        return view('Meal.show')->with(['meal' => $meal]);
    }
}
