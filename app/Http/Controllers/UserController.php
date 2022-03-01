<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    // public function index(){
    //     $users = User::all();
    //     return view('menu.users', compact('users'));
    // }
    public function index(Request $request){
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)->addIndexColumn()
                    ->addColumn('action', function($row){
                           $Btn = '<a href="javascript:void(0)" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="delete btn btn-danger btn-xl mr-3">Delete</a>';
                            $Btn=$Btn.'<a href="javascript:void(0)" class="view btn btn-primary btn-xl mr-3">View</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.users');
    }
}
