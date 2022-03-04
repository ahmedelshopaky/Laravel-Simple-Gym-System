<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\TrainingPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BuyPackageController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $dataTrainingPackage = TrainingPackage::all();
            $dataUser = User::all();
            $dataGym = Gym::all();
         

            return Datatables::of($dataGym)->addIndexColumn()
                    ->addColumn('action', function($row){
                           $Btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="delete btn btn-danger btn-xl mr-3">Delete</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="view btn btn-primary btn-xl mr-3">View</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.buy_package');
    }
}