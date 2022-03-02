<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $gymMember = User::with('gym_member')->get();
            $gymManager = User::with('gym_manager')->get();
            $cityManager = User::with('city_manager')->get();
            return Datatables::of($gymMember)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $Btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                    $Btn = $Btn . '<a href="javascript:void(0)" class="delete btn btn-danger btn-xl mr-3">Delete</a>';
                    $Btn = $Btn . '<a href="javascript:void(0)" class="view btn btn-primary btn-xl mr-3">View</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.users');
    }

    public function create() {
        //
    }

    public function store() {
        //
    }

    public function edit() {
        //
    }

    public function update() {
        //
    }

    public function show() {
        //
    }

    public function destroy() {
        //
    }
    // $gymManager=GymManager::with('user')->where('user_id',$user_id)->get();

    // return response()->json(['success'=>'the row deleted Successfully']);
}
