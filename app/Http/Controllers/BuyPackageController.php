<?php

namespace App\Http\Controllers;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;

class BuyPackageController extends Controller
{
    public function index()
    {
        $training_packages = TrainingPackage::all();
        return view('menu.buy_package', compact('training_packages'));
    }
}