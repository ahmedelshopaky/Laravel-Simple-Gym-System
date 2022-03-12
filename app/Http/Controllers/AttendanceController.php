<?php

namespace App\Http\Controllers;

use App\Http\Resources\AttendanceResource;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $user = AttendanceResource::collection(Attendance::with('training_session', 'gym_member')->get());
            return Datatables::of($user)->addIndexColumn()->make(true);
        }
        return view('menu.attendance.index');
    }
}