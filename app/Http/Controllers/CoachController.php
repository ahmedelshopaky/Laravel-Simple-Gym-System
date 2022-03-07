<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCoachRequest;
use App\Models\Coach;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CoachController extends Controller
{
    
    public function index(Request $request){
        if ($request->ajax()) {
            $coaches = Coach::with('gym')->get();
            return Datatables::of($coaches)->addIndexColumn()
                    ->addColumn('action', function($coach){
                         
                            $Btn='<a href="'.route('coaches.show',$coach->id).'" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>';
                            $Btn .= '<a href="'.route('coaches.edit',$coach->id).'" class="edit btn btn-info btn-sm mr-3 text-white"> <i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                            $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="' . $coach->id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert"><i class="fas fa-trash mr-2"> </i>Delete</a>';
                            return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.coaches.index');
    }
    public function create() {
        $gyms = Coach::with('gym')->get();
        return view('menu.coaches.create', compact('gyms'));
    }

    public function store() {
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
        $coach=Coach::find($id);
        return view('menu.coaches.edit',compact('coach'));
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