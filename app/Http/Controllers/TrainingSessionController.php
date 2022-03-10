<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingSessionRequest;
use App\Http\Resources\TrainingSessionResource;
use App\Models\Coach;
use App\Models\Gym;
use App\Models\TrainingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
            $trainingSessions = TrainingSessionResource::collection(TrainingSession::with('gym')->get());
            return DataTables::of($trainingSessions)->addIndexColumn()
                ->addColumn('action', function ($trainingSession) {
                    $Btn = '<a href="' . route('training-sessions.show', $trainingSession['id']) . '" class="view btn btn-primary btn-sm mr-3 "> <i class="fas fa-folder mr-2""> </i>View</a>';
                    $Btn .= '<a href="' . route('training-sessions.edit', $trainingSession['id']) . '" class="edit btn btn-info btn-sm mr-3 text-white"> <i class="fas fa-pencil-alt mr-2"> </i> Edit</a>';
                    $Btn .= '<a href="javascript:void(0)" data-id="' . $trainingSession['id'] . '" data-bs-toggle="modal" data-bs-target="#deleteAlert" class="btn btn-danger btn-sm mr-3 delete"> <i class="fas fa-trash mr-2"">  </i>Delete</a>';
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
        $coaches = $gyms->first()->coaches;
        return view('menu.training_sessions.create', compact('gyms','coaches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingSessionRequest $request)
    {
        // $validated = $request->validated();
        $trainSessionWithCoach=array_slice(request()->all(),count(request()->all())-1);
        $trainingSession=array_slice(request()->all(),1,count(request()->all())-2);
        $trainingSession=TrainingSession::create($trainingSession);
        
        $trainSessionWithCoach['training_session_id']=$trainingSession->id;
        DB::table('coach_training_session')->insert($trainSessionWithCoach);
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
        $trainingSession = TrainingSession::find($id);
        return view('menu.training_sessions.show', compact('trainingSession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trainingSession = TrainingSession::find($id);
        if (
            $trainingSession->strats_at < now() &&
            $trainingSession->finishes_at > now() &&
            $trainingSession->gym_members->count() > 0
        ) 
        {
            return 'Hahaha';
        } 
        else {
            $gyms = Gym::all();
            return view('menu.training_sessions.edit', compact('trainingSession', 'gyms'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTrainingSessionRequest $request, $id)
    {
        $validated = $request->validated();

        $trainingSession = TrainingSession::find($id);
        if ($trainingSession) {
            $trainingSession->update($validated);
        }
        return view('menu.training_sessions.show', compact('trainingSession'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $trainingSession = TrainingSession::find($id);
        // if (
        //     $trainingSession->strats_at < now() &&
        //     $trainingSession->finishes_at > now() &&
        //     $trainingSession->gym_members->count() > 0
        // ) {
        //     return 'Hahaha';
        // } else {
            TrainingSession::find($id)->delete();
            return response()->json(['success' => 'This session has been deleted successfully']);
        // }
    }
    public function getCoaches($gymId)
    {
        $coaches=Coach::where('gym_id',$gymId)->get();
        return response()->json($coaches);
    }
}