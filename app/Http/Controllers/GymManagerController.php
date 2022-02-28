<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GymManager;
use DataTables;


class GymManagerController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = GymManager::latest()->get();

            return Datatables::of($data)->addIndexColumn()
                    ->addColumn('action', function($row){
                           $Btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">Edit</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="view btn btn-primary btn-sm">View</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.gym_managers');
    }
}
