<?php

namespace App\Http\Controllers;

use App\Models\TrainingPackage;
use Illuminate\Http\Request;

class TrainingPackageController extends Controller
{
    public function index()
    {
        $training_packages = TrainingPackage::all();
        return view('menu.training_packages', compact('training_packages'));
    }
}
