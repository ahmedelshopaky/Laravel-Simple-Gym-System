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
        if ($request->ajax()) {
            $cityManager = CityManager::with('user')->get();
            return Datatables::of($cityManager)->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $Btn = '<a href="' . route('users.show', $user->user_id) . '" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>';
                    $Btn .= '<a href="' . route('city-managers.edit', $user->user_id) . '" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="' . $user->user_id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.city_manager.index');
    }

    public function create() {
        $cities = City::all();
        return view('menu.city_manager.create', compact('cities'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $cities = City::all();
        return view('menu.city_manager.edit', compact('user', 'cities'));
    }
}
