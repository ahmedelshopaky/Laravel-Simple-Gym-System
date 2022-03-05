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
            $gymManager = GymManager::with('user')->get();
            return Datatables::of($gymManager)->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $Btn  = '<a href="' . route('users.show', $user->user_id) . '" data-toggle="tooltip" class="btn btn-primary btn-sm mr-3 "   data-id="' . $user->user_id . '" data-original-title="View" > <i class="fas fa-folder mr-2"> </i>View</a>';
                    $Btn .= '<a href="' . route('users.edit', $user->user_id) . '" data-toggle="tooltip" class="btn btn-info btn-sm mr-3 text-white" data-id="' . $user->user_id . '" data-original-title="Edit"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="' . $user->user_id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.gym_manager.index');
    }

    public function create() {
        $gyms = Gym::all();
        return view('menu.gym_manager.create', compact('gyms'));
    }

    // public function ban(GymManager $gymManager)
    // {
    //     $gymManager->ban();
    //     return redirect()->route('gymManagers.index');
    // }
 
    public function ban(GymManager $gymManager)
    {
        $gymManager->ban();
        return to_route('gym-managers.index');
    }

    public function unban(GymManager $gymManager)
    {
        $gymManager->unban();
        return to_route('gym-managers.index');
    }
}
