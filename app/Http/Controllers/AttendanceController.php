<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('menu.attendance', compact('users'));
    }
}