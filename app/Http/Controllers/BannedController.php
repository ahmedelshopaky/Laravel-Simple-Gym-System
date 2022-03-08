<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BannedController extends Controller
{
    public function index()
    {
        return view('menu.gym_manager.ban');
    }
}