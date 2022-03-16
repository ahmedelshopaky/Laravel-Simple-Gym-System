<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\GymManager;
use App\Models\GymMember;
use App\Models\Revenue;
use App\Models\TrainingPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyPackageController extends Controller
{
    public function create()
    {
        $gymMembers = GymMember::with('user')->get();
        $trainingPackages = TrainingPackage::all();
        // $user = Auth::user();
        if (Auth::user()->hasRole('admin')) 
        {
            $gyms = GymController::getAllGyms();

        } 
        else if (Auth::user()->hasRole('cityManager')) 
        {
            $gyms = GymController::getCityManagerGyms();

        } 
        else if (Auth::user()->hasRole('gymManager')) 
        {
            $gym = GymController::getGymManagerGym();
            $gyms = compact('gym');
        }
        return view('menu.buy_package.create', compact('gymMembers', 'trainingPackages', 'gyms'));
    }

    public function store(Request $request)
    {
        $request->session()->put('gym', $request->gym);
        $request->session()->put('gym_member', $request->gym_member);
        $request->session()->put('training_package', $request->training_package);
        return view('menu.buy_package.stripe', [
            'intent' => Auth::user()->createSetupIntent(),
            'price' => TrainingPackage::find($request->training_package)->price / 100,
            'gymMember' => GymMember::where('user_id',$request->gym_member)->first()->user->name,

        ]);
    }

    public function singleCharge(Request $request)
    {
        $gymFromSession = $request->session()->get('gym');
        $gym_memberFromSession = $request->session()->get('gym_member');
        $training_packageFromSession = $request->session()->get('training_package');

        $amount = $request->amount;
        $amount = $amount * 100;
        $paymentMethod = $request->payment_method;
        Auth::user()->createOrGetStripeCustomer();
        $paymentMethod = Auth::user()->addPaymentMethod($paymentMethod);
        Auth::user()->charge($amount, $paymentMethod->id);

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

    public function stripe()
    {
        return view('menu.buy_package.stripe', [
            'intent' => Auth::user()->createSetupIntent()
        ]);
    }
    
}