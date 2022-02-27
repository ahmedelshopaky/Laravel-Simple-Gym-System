<?php

namespace App\Http\Controllers;

use App\Models\GymManager;
use Illuminate\Http\Request;

class GymManagerController extends Controller
{
    
    public function index()
    {
        $gym_managers = GymManager::all();
        return view('menu.gym_managers', compact('gym_managers'));
    }
}
