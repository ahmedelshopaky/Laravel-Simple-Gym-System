<?php

namespace App\Http\Controllers;
use App\Models\Revenue;

use Illuminate\Http\Request;

class RevenueController extends Controller
{
    
    public function index()
    {
        $revenues = Revenue::all();
        return view('menu.revenue', compact('revenues'));
    }
}