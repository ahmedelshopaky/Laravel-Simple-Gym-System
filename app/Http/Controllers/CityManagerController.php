<?php

namespace App\Http\Controllers;
use App\Models\CityManager;
use Illuminate\Http\Request;
use DataTables;


class CityManagerController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $data = CityManager::first()->get();
           

            return Datatables::of($data)->addIndexColumn()
                    ->addColumn('action', function($row){
                           $Btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm mr-3">Edit</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="delete btn btn-danger btn-sm mr-3">Delete</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="view btn btn-primary btn-sm mr-3">View</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.city_managers');
    }
}
