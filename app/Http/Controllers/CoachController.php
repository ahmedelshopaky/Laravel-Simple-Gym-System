<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCoachRequest;
use App\Models\Coach;
use App\Models\Gym;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CoachController extends Controller
{
    
    public function index(Request $request){
        if ($request->ajax()) 
        {
            $coaches = Coach::with('gym')->get();
            return Datatables::of($coaches)->addIndexColumn()->make(true);
        }
      
        return view('menu.coaches.index');
    }
    public function create() 
    {
        $gyms = GymController::getAllGyms();
        return view('menu.coaches.create', compact('gyms'));
    }

    public function store() 
    {
        Coach::insert([
            'name' => request()->name,
            'gym_id' => request()->gym,
        ]);
        return view('menu.coaches.index');
    }
    public  function show($id)
    {
        $coach=Coach::find($id);
        return view('menu.coaches.show',compact('coach'));
    }
    public function edit($id)
    {
        $gyms = GymController::getAllGyms();
        $coach=Coach::find($id);
        return view('menu.coaches.edit',compact('coach', 'gyms'));
    }
    public function update(UpdateCoachRequest $request,$id)
    {
        Coach::find($id)->update(request()->all());
        return view('menu.coaches.index');
    }
    public function destroy($id)
    {
        Coach::find($id)->delete();
        return request()->json(['success'=> 'row delete Successfully']);
    }
}