<?php

namespace App\Http\Controllers;

use App\Models\User;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index(){
        // $users = User::all();
        // return view('menu.users', compact('users'));
        
        return DataTables::of(User::all())->make(true);
    }
}