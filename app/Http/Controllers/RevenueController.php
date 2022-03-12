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
        $totalRevenue = 0;
        $totalRevenueLastMonth=0;
        $totalRevenueLastYear=0;
        if (Auth::user()->role == "admin") 
        {
            $totalRevenue = Revenue::all()->sum('amount_paid');
            $totalRevenueLastMonth=Revenue::where('purchased_at','>',Carbon::now()->subDays(30))->sum('amount_paid');
            $totalRevenueLastYear=Revenue::where('purchased_at','>',Carbon::now()->subMonths(12))->sum('amount_paid');
            $revenueData = RevenueResource::collection(Revenue::with('training_packages', 'gym_members')->get());
        } 
        elseif (Auth::user()->role == "city_manager") 
        {         
            $totalRevenue=Revenue::whereIn('gym_id', Gym::where('city_manager_id',Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
            $totalRevenueLastMonth=Revenue::where('purchased_at','>',Carbon::now()->subDays(30))->whereIn('gym_id', Gym::where('city_manager_id',Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
            $totalRevenueLastYear=Revenue::where('purchased_at','>',Carbon::now()->subMonths(12))->whereIn('gym_id', Gym::where('city_manager_id',Auth::id())->get()->pluck('id'))->get()->sum('amount_paid');
            $revenueData=RevenueResource::collection(Revenue::with('training_packages', 'gym_members')->whereIn('gym_id',Gym::where('city_manager_id',Auth::id())->get()->pluck('id'))->get());
        }
        elseif (Auth::user()->role == "gym_manager") 
        {
            $totalRevenue = GymManager::where('user_id', Auth::user()->id)->get()->first() ? Revenue::where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid') : 0;
            $totalRevenueLastMonth=Revenue::where('purchased_at','>',Carbon::now()->subDays(30))->where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid');
            $totalRevenueLastYear=Revenue::where('purchased_at','>',Carbon::now()->subMonths(12))->where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid');
            $revenueData = RevenueResource::collection(Revenue::with('training_packages', 'gym_members')->where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->get());
        }
        if ($request->ajax()) 
        {
            return DataTables::of($revenueData)->addIndexColumn()->make(true);
        }
        return view('menu.revenue.index', compact('totalRevenue','totalRevenueLastMonth','totalRevenueLastYear'));
    }
}