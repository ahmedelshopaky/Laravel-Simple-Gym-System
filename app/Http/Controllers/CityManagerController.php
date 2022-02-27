<?php

namespace App\Http\Controllers;
use App\Models\CityManager;
use Illuminate\Http\Request;

class CityManagerController extends Controller
{
    public function index()
    {
        $gym_managers = CityManager::all();
        return view('menu.city_managers', compact('city_managers'));
    }
}
