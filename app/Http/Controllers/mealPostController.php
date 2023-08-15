<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mealPostController extends Controller
{
    public function index()
    {
        return view('Meal.index');
    }
}
