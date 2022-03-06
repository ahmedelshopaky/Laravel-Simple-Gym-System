<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Http\Resources\GymResource;
use App\Models\City;
use App\Models\Gym;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $cities = CityResource::collection(City::with('city_manager', 'gyms')->get());
            return DataTables::of($cities)->addIndexColumn()
                // ->addColumn('action', function ($gym) {
                //     $Btn = '<a href="javascript:void(0)" class="view btn btn-primary btn-sm mr-3 "> <i class="fas fa-folder mr-2"> </i>View</a>';
                //     $Btn .= '<a href="javascript:void(0)" class="edit btn btn-info btn-sm mr-3 text-white"> <i class="fas fa-pencil-alt mr-2"> </i> Edit</a>';
                //     $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id=""  data-bs-toggle="modal" data-bs-target="#deleteAlert"> <i class="fas fa-trash mr-2">  </i>Delete</a>';
                //     return $Btn;
                // })
                // ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.city.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
