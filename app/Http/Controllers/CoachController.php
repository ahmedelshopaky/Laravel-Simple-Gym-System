<?php

namespace App\Http\Controllers;
use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    
    public function index()
    {
        $coaches = Coach::all();
        return view('menu.coaches', compact('coaches'));
    }

    
}
