<?php

namespace App\Http\Controllers;
use App\Models\Gym;
use Illuminate\Http\Request;

class GymController extends Controller
{
   
    public function index()
    {
        $gyms = Gym::all();
        return view('menu.gyms', compact('gyms'));

    }
    public function showCity() {
        return view('menu.cities');
    }
}
