<?php

namespace App\Http\Controllers;
use App\Models\UserTrainingSession;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function index()
    {
        $training_sessions_users = UserTrainingSession::all();
        return view('menu.attendance', compact('training_sessions_users'));
    }
}