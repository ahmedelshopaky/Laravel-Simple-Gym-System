<?php

namespace App\Http\Controllers;

use App\Models\TrainingSession;

use Illuminate\Http\Request;

class TrainingSessionController extends Controller
{
    public function index()
    {
        $training_sessions = TrainingSession::all();
        return view('menu.training_sessions', compact('training_sessions'));
    }
}
