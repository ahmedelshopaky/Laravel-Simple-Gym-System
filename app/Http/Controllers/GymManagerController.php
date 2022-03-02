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
            $gymManager = GymManager::with('user')->get();
            return Datatables::of($gymManager)->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $Btn  = '<a href="' . route('users.show', $user->user_id) . '" data-toggle="tooltip" class="btn btn-info btn-xl mx-3 "   data-id="' . $user->user_id . '" data-original-title="View" >View</a>';
                    $Btn .= '<a href="' . route('users.edit', $user->user_id) . '" data-toggle="tooltip" class="btn btn-primary btn-xl mx-3 " data-id="' . $user->user_id . '" data-original-title="Edit">Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-xl mx-3 deleteManager"  data-id="' . $user->user_id . '" data-original-title="Delete">Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.gym_manager.index');
    }
}
