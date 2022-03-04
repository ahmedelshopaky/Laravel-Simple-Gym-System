<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttendanceController extends Controller
{

   
    public function index(Request $request)
    {
        // $data = Attendance::with('training_session','gym_member')->get();
        // dd($data);
        if ($request->ajax()) {
            $user = Attendance::with('training_session','gym_member')->get();
            
            return Datatables::of($user)->addIndexColumn()
              
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.attendance');
    }
}