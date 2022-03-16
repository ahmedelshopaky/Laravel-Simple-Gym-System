<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\CityManager;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class CityManagerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $cityManager = CityManager::with('user')->get();
            return Datatables::of($cityManager)->addIndexColumn()->make(true);
        }
        return view('menu.city_manager.index');
    }

    public function create() 
    {
        $cities = City::leftJoin('city_managers', 'cities.id', '=', 'city_managers.city_id')->where('user_id',null)->get();
        return view('menu.city_manager.create', compact('cities'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $cities = City::leftJoin('city_managers', 'cities.id', '=', 'city_managers.city_id')->where('user_id',null)->get();
        return view('menu.city_manager.edit', compact('user', 'cities'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('menu.city_manager.show', compact('user'));
    }
}