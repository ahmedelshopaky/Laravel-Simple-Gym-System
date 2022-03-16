<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTrainingSessionRequest;
use App\Http\Resources\TrainingSessionResource;
use App\Models\Coach;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\TrainingSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
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
        if (Auth::user()->role == "admin") {
            $trainingSessions = TrainingSessionResource::collection(TrainingSession::with('gym')->get());
        } else if (Auth::user()->role == "city_manager") {
            $trainingSessions = TrainingSessionResource::collection(TrainingSession::with('gym')->whereIn('gym_id', Gym::where('city_manager_id', Auth::id())->get()->pluck('id'))->get());
        } else if (Auth::user()->role == "gym_manager") {
            $gymID = GymManager::where('user_id', Auth::user()->id)->get()->first()->gym_id;
            $trainingSessions = TrainingSessionResource::collection(TrainingSession::with('gym')->where('gym_id', $gymID)->get());
        }
        if ($request->ajax()) {
            return DataTables::of($trainingSessions)->addIndexColumn()->make(true);
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
        if (Auth::user()->role == "admin") {
            $gyms = Gym::all();
            $coaches = $gyms->first()->coaches;
        } else if (Auth::user()->role == "gym_manager") {
            $gyms = GymManager::where('user_id', Auth::user()->id)->first()->gym;
            $coaches = Coach::whereIn('gym_id', GymManager::where('user_id', Auth::id())->pluck('gym_id'))->get();
        } else if (Auth::user()->role == "city_manager") {
            $gyms = Gym::where('city_manager_id', Auth::id())->get();
            $coaches = Coach::whereIn('gym_id', Gym::where('city_manager_id', Auth::user()->id)->get()->pluck('id'))->get();
        }
        return view('menu.training_sessions.create', compact('gyms', 'coaches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrainingSessionRequest $request)
    {
        if (TrainingSession::where('starts_at', '<', request()->starts_at)->where('finishes_at', '>', request()->starts_at)->first() == null) {
            $trainSessionWithCoach = array_slice(request()->all(), count(request()->all()) - 1);
            $trainingSession = array_slice(request()->all(), 1, count(request()->all()) - 2);
            $trainingSession = TrainingSession::create($trainingSession);
            $trainSessionWithCoach['training_session_id'] = $trainingSession->id;
            DB::table('coach_training_session')->insert($trainSessionWithCoach);
            return view('menu.training_sessions.index');
            // return 'success';
        } else {
            return Redirect::back()->withErrors(['msg' => false]);
            // return 'fail';
        }
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
        ) {
            return Redirect::back()->withErrors(['msg' => false]);
        } else {
            if (Auth::user()->role == "admin") {
                $gyms = GymController::getAllGyms();
                $coaches = $gyms->first()->coaches;
            } else if (Auth::user()->role == "gym_manager") {
                $gyms = GymController::getGymManagerGym();
                $coaches = Coach::whereIn('gym_id', GymManager::where('user_id', Auth::id())->pluck('gym_id'))->get();
            } else if (Auth::user()->role == "city_manager") {
                $gyms = GymController::getCityManagerGyms();
                $coaches = Coach::whereIn('gym_id', Gym::where('city_manager_id', Auth::user()->id)->get()->pluck('id'))->get();
            }
            return view('menu.training_sessions.edit', compact('trainingSession', 'gyms', 'coaches'));
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
        if (TrainingSession::where('starts_at', '<', request()->starts_at)->where('finishes_at', '>', request()->starts_at)->first() == null) {
            $validated = $request->validated();

            $trainingSession = TrainingSession::find($id);
            if ($trainingSession) {
                $trainingSession->update($validated);
            }
            return view('menu.training_sessions.show', compact('trainingSession'));
        } else {
            return Redirect::back()->withErrors(['msg' => false]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainingSession = TrainingSession::find($id);
        if (
            $trainingSession->strats_at < now() &&
            $trainingSession->finishes_at > now() &&
            $trainingSession->gym_members->count() > 0
        ) {
            return response()->json(['message' => false]);
        } else {
            TrainingSession::find($id)->delete();
            return response()->json(['message' => true]);
        }
    }
    public function getCoaches($gymId)
    {
        $coaches = Coach::where('gym_id', $gymId)->get();
        return response()->json($coaches);
    }
}