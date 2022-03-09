<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\GymManager;
use App\Models\User;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class GymManagerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $gymManager = User::role('gymManager')->withBanned()->get();
            return Datatables::of($gymManager)->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $Btn  = '<a href="' . route('gym-managers.show', $user->id) . '" data-toggle="tooltip" class="btn btn-primary btn-sm mr-3 "   data-id="' . $user->id . '" data-original-title="View" > <i class="fas fa-folder mr-2"> </i>View</a>';
                    $Btn .= '<a href="' . route('gym-managers.edit', $user->id) . '" data-toggle="tooltip" class="btn btn-info btn-sm mr-3 text-white" data-id="' . $user->id . '" data-original-title="Edit"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="' . $user->id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>';
                    if ($user->banned_at==null) {
                        $Btn .= '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-warning btn-sm mr-3 text-white ban" data-id="' . $user->id . '" data-original-title="ban">Ban</a>';
                    } else {
                        $Btn .= '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-success btn-sm mr-3 text-white unban" data-id="' . $user->id . '" data-original-title="unban">UnBan</a>';
                    }
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.gym_manager.index');
    }

    public function create()
    {
        $gyms = Gym::all();
        return view('menu.gym_manager.create', compact('gyms'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $gyms = Gym::all();
        return view('menu.gym_manager.edit', compact('user', 'gyms'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('menu.gym_manager.show', compact('user'));
    }
}
