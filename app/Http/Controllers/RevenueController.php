<?php

namespace App\Http\Controllers;

use App\Http\Resources\RevenueResource;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RevenueController extends Controller
{
    public function index(Request $request)
    {
            $totalRevenue = $this->getTotalRevenue(Auth::user()->role);
            $totalRevenueLastMonth = $this->getTotalRevenueLastMonth(Auth::user()->role);   
            $totalRevenueLastYear = $this->getTotalRevenueLastYear(Auth::user()->role);
            $revenueData = $this->getRevenueData(Auth::user()->role);
        
        if ($request->ajax()) {
            return DataTables::of($revenueData)->addIndexColumn()->make(true);
        }
        return view('menu.revenue.index', compact('totalRevenue', 'totalRevenueLastMonth', 'totalRevenueLastYear'));
    }
    public function getRevenueData($role)
    {
        if($role == "admin")
            return RevenueResource::collection(Revenue::with('training_packages', 'gym_members')->get());
        elseif($role == "city_manager")
            return RevenueResource::collection(Revenue::with('training_packages', 'gym_members')->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get());
        else if($role == "gym_manager")
            return RevenueResource::collection(Revenue::with('training_packages', 'gym_members')->where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->get());  
    }
    public function getTotalRevenue($role)
    {
        if($role == "admin")
            return Revenue::all()->sum('amount_paid');
        elseif($role == "city_manager")
            return Revenue::whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
        else if($role == "gym_manager")
            return Revenue::where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid');
    }
    public function getTotalRevenueLastMonth($role)
    {
        if($role == "admin")
            return Revenue::where('purchased_at', '>', Carbon::now()->subDays(30))->sum('amount_paid');
        elseif($role == "city_manager")
            return Revenue::where('purchased_at', '>', Carbon::now()->subDays(30))->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
        else if($role == "gym_manager")
            return Revenue::where('purchased_at', '>', Carbon::now()->subDays(30))->where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid');
    }
    public function getTotalRevenueLastYear($role)
    {
        if($role == "admin")
            return Revenue::where('purchased_at', '>', Carbon::now()->subMonths(12))->sum('amount_paid');
        elseif($role == "city_manager")
            return Revenue::where('purchased_at', '>', Carbon::now()->subMonths(12))->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
        else if($role == "gym_manager")
            return Revenue::where('purchased_at', '>', Carbon::now()->subMonths(12))->where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid');
    }
}