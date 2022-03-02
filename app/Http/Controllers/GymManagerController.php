<?php

namespace App\Http\Controllers;

use App\Models\GymManager;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;


class GymManagerController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = GymManager::all();
            return Datatables::of($users)->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $Btn  = '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-info btn-sm mx-3 "   data-id="'.$user->id.'" data-original-title="View" >View</a>';
                    $Btn .= '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-primary btn-sm mx-3 " data-id="'.$user->id.'" data-original-title="Edit">Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mx-3 deleteManager"  data-id="'.$user->id.'" data-original-title="Delete">Delete</a>';   
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('menu.gym_manager.index');
    }

    public function show($id)
    {
        $gymManager=GymManager::find($id);
        return view('menu.gym_manager.index',compact('gymManager'));
    }

    public function edit()
    {
        return view('menu.gym_manager.edit');
    }

    public function destroy($id)
    {
        GymManager::find($id)->delete();
        return response()->json(['success'=>'the row deleted Successfully']);
    }
}