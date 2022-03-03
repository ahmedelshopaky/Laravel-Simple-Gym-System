<?php

namespace App\Http\Controllers;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GymController extends Controller
{
    public function index(Request $request){
        $data = Gym::all();
        $user = User::find($data[0]->city_manager_id);
        if ($request->ajax()) {
            $gym = Gym::with('city_managers')->get();
            return Datatables::of($gym)->addIndexColumn()
                    ->addColumn('action', function($row){
                           $Btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="delete btn btn-danger btn-xl mr-3">Delete</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="view btn btn-primary btn-xl mr-3">View</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.gyms');
    }

    public function showCity() {
        return view('menu.cities');
    }
}
