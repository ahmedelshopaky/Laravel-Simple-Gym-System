<?php

namespace App\Http\Controllers;

use App\Models\GymMember;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GymMemberController extends Controller
{
    public function index(Request $request)
    {
        $gymMember = GymMember::with('user')->get();
        if ($request->ajax()) 
        {
            return DataTables::of($gymMember)->addIndexColumn()->make(true);
        }
        return view('menu.gym_member.index');
    }
    
    public function create() 
    {
        return view('menu.gym_member.create');
    }
    
    public function show($id) 
    {
        $user = User::find($id);
        return view('menu.gym_member.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('menu.gym_member.edit', compact('user'));
    }
}