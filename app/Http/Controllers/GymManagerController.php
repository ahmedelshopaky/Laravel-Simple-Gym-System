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
            $data = GymManager::all();
            return Datatables::of($data)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $Btn = '<a href="/gym-managers/edit" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                    $Btn = $Btn . '<a href="javascript:void(0)" class="delete btn btn-danger btn-xl mr-3">Delete</a>';
                    $Btn = $Btn . '<a href="javascript:void(0)" class="view btn btn-primary btn-xl mr-3">View</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('menu.gym_manager.index');
    }

    public function edit(Request $request)
    {
        return view('menu.gym_manager.edit');
    }
}
