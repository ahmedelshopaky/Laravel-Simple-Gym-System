<?php

namespace App\Http\Controllers;
use App\Models\Revenue;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class RevenueController extends Controller
{
    
   

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $revenues = Revenue::with('gym_member','gym','training_package')->get();

            // $data= GymManager::collection($data);
            return Datatables::of($revenues)->addIndexColumn()
            
                ->addColumn('action', function ($user) {
                    $Btn  = '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-info btn-sm mx-3 "   data-id="'.$user->id.'" data-original-title="View" >View</a>';
                    $Btn .= '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-primary btn-sm mx-3 " data-id="'.$user->id.'" data-original-title="Edit">Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mx-3 deleteManager"  data-id="'.$user->id.'" data-original-title="Delete">Delete</a>';   
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('menu.revenue');
    }
}