<?php

namespace App\Http\Controllers;

use App\Models\GymManager;
use App\Models\User;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class GymManagerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $gymManager = GymManager::with('user')->get();
            return Datatables::of($gymManager)->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $Btn  = '<a href="' . route('users.show', $user->user_id) . '" data-toggle="tooltip" class="btn btn-info btn-xl mx-3 "   data-id="' . $user->user_id . '" data-original-title="View" >View</a>';
                    $Btn .= '<a href="' . route('users.edit', $user->user_id) . '" data-toggle="tooltip" class="btn btn-primary btn-xl mx-3 " data-id="' . $user->user_id . '" data-original-title="Edit">Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-xl mx-3 delete"  data-id="' . $user->user_id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert">Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.gym_manager.index');
    }

    // public function ban(GymManager $gymManager)
    // {
    //     $gymManager->ban();
    //     return redirect()->route('gymManagers.index');
    // }

    // public function unban(GymManager $gymManager)
    // {
    //     $gymManager->unban();
    //     return redirect()->route('gymManagers.index');
    // }
}
