<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\GymMember;
use App\Models\Revenue;
use App\Models\TrainingPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BuyPackageController extends Controller
{
    public function create(){
        $gymMembers = GymMember::with('user')->get();
        $trainingPackages = TrainingPackage::all();
        // $amountPaid = Revenue::all();
        // $user= auth()->user();
        $gyms = Gym::all();
      
        return view('menu.buy_package.create', compact('gymMembers', 'trainingPackages', 'gyms'));
    }

    public function store(Request $request){
        $request->session()->put('gym', $request->gym);
        $request->session()->put('gym_member', $request->gym_member);
        $request->session()->put('training_package', $request->training_package);
        // $triningPackage = TrainingPackage::find($request->training_package);
        // $gym = Gym::find($request->gym);
        // $gymMember = GymMember::where('user_id', $request->gym_member)->with('user')->get()->first();

        // Revenue::insert([
        //     'gym_id' => $request->gym,
        //     'gym_member_id' => $request->gym_member,
        //     'package_id' => $request->training_package,

        //     'amount_paid' => $triningPackage->price,
        //     'purchased_at' => now(),
        // ]);
        // return view('menu.buy_package.show', compact('gym', 'triningPackage', 'gymMember'));
        $user= auth()->user();
        return view('menu.buy_package.stripe', [
            'intent' => $user->createSetupIntent()
        ]);
    }

    public function singleCharge(Request $request){
        $gymFromSession = $request->session()->get('gym');
        $gym_memberFromSession = $request->session()->get('gym_member');
        $training_packageFromSession = $request->session()->get('training_package');

        $amount = $request->amount;
        $amount = $amount *100;
        $paymentMethod = $request->payment_method;
        $user = auth()->user();
        $user->createOrGetStripeCustomer();
        $paymentMethod = $user->addPaymentMethod($paymentMethod);
        $user->charge($amount, $paymentMethod->id);
        

        $triningPackage = TrainingPackage::find($training_packageFromSession);
        $gym = Gym::find($gymFromSession);
        $gymMember = GymMember::where('user_id', $gym_memberFromSession)->with('user')->get()->first();

        Revenue::insert([
            'gym_id' => $gymFromSession,
            'gym_member_id' => $gym_memberFromSession,
            'package_id' => $training_packageFromSession,

            'amount_paid' => $triningPackage->price,
            'purchased_at' => now(),
        ]);
        return view('menu.buy_package.show', compact('gym', 'triningPackage', 'gymMember'));
    }

    public function stripe() {
        $user= auth()->user();
        return view('menu.buy_package.stripe', [
            'intent' => $user->createSetupIntent()
        ]);
    }
}