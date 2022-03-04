<?php

namespace App\Http\Controllers;

use App\Models\GymMember;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GymMemberController extends Controller
{
    public function index(Request $request)
    {
        $gymMember = GymMember::with('user')->get();
        if ($request->ajax()) {
            return DataTables::of($gymMember)->addIndexColumn()
                ->addColumn('action', function ($user) 
                {
                    $Btn   = '<a href="' . route('users.show', $user->user_id) . '" class="btn btn-info btn-xl mr-3">View</a>';
                    $Btn  .= '<a href="' . route('users.edit', $user->user_id) . '" class="edit btn btn-primary btn-xl mr-3">Edit</a>';
                    $Btn  .= '<a href="javascript:void(0)"  class="btn btn-danger btn-xl mx-3 delete"  data-id="' . $user->user_id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert">Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.gym_member.index');
    }
}