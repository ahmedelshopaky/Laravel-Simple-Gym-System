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
                    $Btn = '<a href="'.route('gym-managers.edit',$user->user_id).'" class="btn btn-primary btn-sm mr-3">Edit</a>';

                    $Btn = $Btn . '<a href="'.route('gym-managers.show',$user->user_id).'" class="btn btn-primary btn-sm mr-3">View</a>';
                    
                    $Btn = $Btn . '
                    <form action="'.route('gym-managers.destroy',$user->user_id).'" method="post" class="d-inline">'
                        .csrf_field().method_field('delete')
                        .'<input type="submit" value="Delete" class="btn btn-danger btn-sm mr-3">
                    </form>';
                    
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
        return view('menu.gym_manager.index',$gymManager);
    }

    public function edit()
    {
        return view('menu.gym_manager.edit');
    }

    public function destroy($id)
    {
        GymManager::find($id)->delete();
        return view('menu.gym_manager.index');
    }
}