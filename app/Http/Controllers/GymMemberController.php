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
                // ->addColumn('action', function ($user) 
                // {
                //     $Btn   = '<a href="' . route('gym-members.show', $user->user_id) . '" class="btn btn-primary btn-sm mr-3"><i class="fas fa-folder mr-2"> </i>View</a>';
                //     $Btn  .= '<a href="' . route('gym-members.edit', $user->user_id) . '" class="edit btn btn-info text-white btn-sm mr-3"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                //     $Btn  .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="' . $user->user_id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert"> <i class="fas fa-trash mr-2"> </i>Delete</a>';
                //     return $Btn;
                // })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.gym_member.index');
    }
    
    public function create() {
        return view('menu.gym_member.create');
    }
    
    public function show($id) {
        $user = User::find($id);
        return view('menu.gym_member.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('menu.gym_member.edit', compact('user'));
    }
}