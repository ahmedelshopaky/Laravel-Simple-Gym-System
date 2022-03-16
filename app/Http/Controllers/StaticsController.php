<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\City;
use App\Models\GymMember;
use App\Models\Revenue;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StaticsController extends Controller
{
    //
        public function index()
    {   
        if (request()->ajax()) {
            $allCharts['attendenceChart']=$this->getGenderData();
            $allCharts['RevenueData']=$this->getRevenueData();
            $allCharts['cityAttendence']=$this->getCityAttendence();
            $allCharts['topPurchasedUsers']=$this->getTopPurchasedUsers(10);
            return response()->json($allCharts);
        }
        return view('menu.statics.statics');
    }
    public function getGenderData()
    {
        $allAttendence=GymMember::whereIn('user_id',Attendance::all()->pluck('gym_member_id'))->get()->groupBy('gender');
        foreach($allAttendence as $key => $value)
        {
            $AttendenceData['label'][]=$key;
            $AttendenceData['data'][]=$value->count();
        }
        
        return $AttendenceData;
    }
    public function getRevenueData()
    {
        $allRevenueData= Revenue::orderBy('purchased_at','asc')->get()
        ->groupBy(function($date) 
            {
                return Carbon::parse($date->purchased_at)->format('Y'); // grouping by years
            })
        ->map(function($traffic){
            return $traffic->groupBy(function($date){
                return Carbon::parse($date->purchased_at)->format('m'); // grouping by Month
            });
            });
            
        $months=['01','02','03','04','05','06','07','08','09',10,11,12];
        foreach ($allRevenueData as $year => $yearData) 
        {
            $RevenueData[$year]['data']=[0,0,0,0,0,0,0,0,0,0,0,0];
            foreach ($yearData as $month => $monthData) {
                $RevenueData[$year]['data'][array_search($month,$months)]=$monthData->sum('amount_paid')/100;
            }
        }
        return $RevenueData;
    }
    public function getCityAttendence()
    {
        $countAttendenceForAllCities=City::orderBy('cities.id')
        ->select('cities.name',DB::raw("count(training_sessions.id) as attendence"))
        ->Join('gyms','cities.id','=','gyms.city_id')
        ->Join('training_sessions','gyms.id','=','training_sessions.gym_id')
        ->Join('gym_member_training_session','training_sessions.id','=','gym_member_training_session.training_session_id')
        ->groupBy('cities.name')
        ->get();
        foreach($countAttendenceForAllCities as $key => $value)
        {
            $AttendenceData['label'][]=$value->name;
            $AttendenceData['data'][]=$value->attendence;
        }
        return $AttendenceData;
    }
    public function getTopPurchasedUsers($number)
    {
        $topUsers=Revenue::select('users.name',DB::raw('sum(training_packages.sessions_number) as sessionNumbers '))
        ->join('training_packages','package_purchase.package_id','=','training_packages.id')
        ->join('users','package_purchase.gym_member_id','=','users.id')
        ->groupBy('users.id','users.name')
        ->orderBy('sessionNumbers','desc')
        ->limit($number)
        ->get();
        foreach($topUsers as $user)
        {
            $topUsersData['label'][]=$user->name;
            $topUsersData['data'][]=$user->sessionNumbers;
        }
        return $topUsersData;
    }

}