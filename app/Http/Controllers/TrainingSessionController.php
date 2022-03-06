<?php

namespace App\Http\Controllers;

use App\Models\Gym;
use App\Models\TrainingSession;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;



class TrainingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $trainingSessions = TrainingSession::with('gym')->get();
            return DataTables::of($trainingSessions)->addIndexColumn()
                ->addColumn('action', function ($trainingSession) {
                    $Btn = '<a href="' . route('training-sessions.show', $trainingSession->id) . '" class="view btn btn-primary btn-sm mr-3 "> <i class="fas fa-folder mr-2""> </i>View</a>';
                    $Btn .= '<a href="" class="edit btn btn-info btn-sm mr-3 text-white"> <i class="fas fa-pencil-alt mr-2"> </i> Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id=""  data-bs-toggle="modal" data-bs-target="#deleteAlert"> <i class="fas fa-trash mr-2"">  </i>Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menu.training_sessions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gyms = Gym::all();
        return view('menu.training_sessions.create', compact('gyms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:training_sessions|min:5|max:255',
            'starts_at' => 'required',      // TODO : finishes at must come after starts at :)
            'finishes_at' => 'required',
            'gym_id' => 'required',
        ]);

        TrainingSession::insert($validated);
        return view('menu.training_sessions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $trainingSession = TrainingSession::find($id);
        // return view('menu.training_sessions.show', compact('trainingSession'));
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
