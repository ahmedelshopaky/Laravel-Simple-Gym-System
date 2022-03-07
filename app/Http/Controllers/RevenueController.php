<?php

namespace App\Http\Controllers;

use App\Http\Resources\RevenueResource;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\Revenue;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class RevenueController extends Controller
{
    public function index(Request $request)
    {

        // if ($request->ajax()) {
        //     $revenues = Revenue::with('gym_member','gym','training_package')->get();

        //     // $data= GymManager::collection($data);
        //     return Datatables::of($revenues)->addIndexColumn()

        //         ->addColumn('action', function ($user) {
        //             $Btn  = '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-info btn-sm mx-3 "   data-id="'.$user->id.'" data-original-title="View" >View</a>';
        //             $Btn .= '<a href="javascript:void(0)" data-toggle="tooltip" class="btn btn-primary btn-sm mx-3 " data-id="'.$user->id.'" data-original-title="Edit">Edit</a>';
        //             $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mx-3 deleteManager"  data-id="'.$user->id.'" data-original-title="Delete">Delete</a>';
        //             return $Btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        $totalRevenue = 0;
        if (Auth::user()->role == "admin") {
            $totalRevenue = Revenue::all()->sum('amount_paid');
        } elseif (Auth::user()->role == "city_manager") {
            $gymNumbers = Gym::where('city_manager_id', Auth::user()->id)->get()->count();
            for ($i = 0; $i < $gymNumbers; $i++) {
                $totalRevenue += Revenue::where('gym_id', Gym::where('city_manager_id', Auth::user()->id)->get()[$i]->id)->sum('amount_paid');
                ;
            }
        } elseif (Auth::user()->role == "gym_manager") {
            $totalRevenue = GymManager::where('user_id', Auth::user()->id)->get()->first() ? Revenue::where('gym_id', GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id)->sum('amount_paid') : 0;
        }
        if ($request->ajax()) {
            // $revenueData = Revenue::with('training_packages', 'gym_members')->get();
            $revenueData = RevenueResource::collection(Revenue::with('training_packages', 'gym_members')->get());
            // $revenueData = [
            //     'id' => Revenue::all()[0]->id,
            //     'gym_member_name' => Revenue::with('gym_members')->get()->first()->gym_members[0]->user->name,
            //     'gym_member_email' => Revenue::with('gym_members')->get()->first()->gym_members[0]->user->email,
            //     'training_package_name' => Revenue::with('training_packages')->get()->first()->training_packages[0]->name,
            //     'amount_paid' => Revenue::all()[0]->amount_paid,
            // ];
            return DataTables::of($revenueData)->addIndexColumn()
                ->make(true);
        }


        return view('menu.revenue.index', compact('totalRevenue'));
    }
}
