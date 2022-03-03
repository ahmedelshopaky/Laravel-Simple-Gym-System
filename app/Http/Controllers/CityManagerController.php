<?php

namespace App\Http\Controllers;

use App\Models\CityManager;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class CityManagerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $cityManager = CityManager::with('user')->get();
            return Datatables::of($cityManager)->addIndexColumn()
                ->addColumn('action', function ($user) {
                    $Btn = '<a href="' . route('users.show', $user->user_id) . '" class="edit btn btn-info btn-xl mr-3">Edit</a>';
                    $Btn = $Btn . '<a href="' . route('users.show', $user->user_id) . '" class="view btn btn-primary btn-xl mr-3">View</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-xl mx-3 delete"  data-id="' . $user->user_id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert">Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.city_manager.index');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['success'=>'This row id deleted successfully']);
    }
}