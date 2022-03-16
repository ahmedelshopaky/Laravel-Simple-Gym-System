<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\User;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class GymManagerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) 
        {
            $gymManager = User::role('gymManager')->withBanned()->get();
            return Datatables::of($gymManager)->addIndexColumn()->make(true);
        }
        return view('menu.gym_manager.index');
    }

    public function create()
    {
        $gyms = GymController::getAllGyms();
        return view('menu.gym_manager.create', compact('gyms'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $gyms = GymController::getAllGyms();
        return view('menu.gym_manager.edit', compact('user', 'gyms'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('menu.gym_manager.show', compact('user'));
    }
}