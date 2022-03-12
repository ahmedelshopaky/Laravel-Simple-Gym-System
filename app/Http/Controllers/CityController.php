<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $cities = CityResource::collection(City::with('city_manager', 'gyms')->get());
            return DataTables::of($cities)->addIndexColumn()->make(true);
        }
        return view('menu.city.index');
    }
}