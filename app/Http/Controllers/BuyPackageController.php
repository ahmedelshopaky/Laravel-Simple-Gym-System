<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\GymMember;
use App\Models\Revenue;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

/*
gym_member -> user
training package
amount paid
gym
*/
class BuyPackageController extends Controller
{
    public function create(){
        $gymMembers = GymMember::with('user')->get();
        $trainingPackages = TrainingPackage::all();
        // $amountPaid = Revenue::all();
        $gyms = Gym::all();
      
        return view('menu.buy_package.create', compact('gymMembers', 'trainingPackages', 'gyms'));
    }

    public function store(Request $request){
        $triningPackage = TrainingPackage::find($request->training_package);
        $gym = Gym::find($request->gym);
        $gymMember = GymMember::where('user_id', $request->gym_member)->with('user')->get()->first();

        Revenue::insert([
            'gym_id' => $request->gym,
            'gym_member_id' => $request->gym_member,
            'package_id' => $request->training_package,

            'amount_paid' => $triningPackage->price * 100,
            'created_at' => now(),
        ]);
        return view('menu.buy_package.show', compact('gym', 'triningPackage', 'gymMember'));
    }
}