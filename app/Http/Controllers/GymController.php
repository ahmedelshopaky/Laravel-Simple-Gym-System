<?php

namespace App\Http\Controllers;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class GymController extends Controller
{
    public function index(Request $request){
        $gyms = Gym::with('city_managers')->get();
        if ($request->ajax()) {
            return Datatables::of($gyms)->addIndexColumn()
                    ->addColumn('action', function($gym){
                        $Btn = '<a href="' . route('gyms.show', $gym->id) . '" class="view btn btn-info btn-xl mr-3">View</a>';
                        $Btn .= '<a href="' . route('gyms.edit', $gym->id) . '" class="edit btn btn-primary btn-xl mr-3">Edit</a>';
                        $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-xl mx-3 delete"  data-id="' . $gym->id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert">Delete</a>';
                        return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.gyms.index');
    }
    public function create()
    {
        return 1;
    }
    public function store()
    {
        return 1;
    }
    public function show($id)
    {
        $gym=Gym::with('city_managers')->get();
        dd($gym);
    }
    public function edit($id)
    {
        return 1;
    }
    public function update()
    {
        return 1;
    }
    public function showCity() {
        return "hi";
    }
}