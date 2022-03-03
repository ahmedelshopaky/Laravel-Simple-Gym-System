<?php

namespace App\Http\Controllers;

use App\Models\CityManager;
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
                    $Btn = '<a href="' . route('users.edit', $user->user_id) . '" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                    $Btn = $Btn . '<a href="' . route('users.show', $user->user_id) . '" class="view btn btn-primary btn-xl mr-3">View</a>';
                    $Btn = $Btn . '<a href="javascript:void(0)" class="delete btn btn-danger btn-xl mr-3">Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.city_manager.index');
    }
}
