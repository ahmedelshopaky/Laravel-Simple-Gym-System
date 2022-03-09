<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGymRequest;
use App\Http\Requests\UpdateGymRequest;
use App\Http\Resources\GymResource;
use App\Models\City;
use App\Models\CityManager;
use App\Models\Gym;
use App\Models\GymManager;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\isNull;

class GymController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if ($user->hasRole('cityManager'))
        {
            $gyms = Gym::with('city')->where('city_manager_id', $user->id)->get();
        } else if ($user->hasRole('admin')){
            $gyms = Gym::with('city')->get();
        }
        if ($request->ajax()) {
            return Datatables::of($gyms)->addIndexColumn()
                ->addColumn('action', function ($gym) {
                    $Btn = '<a href="' . route('gyms.show', $gym->id) . '" class="view btn btn-primary btn-sm mr-3"> <i class="fas fa-folder mr-2"> </i>View</a>';
                    $Btn .= '<a href="' . route('gyms.edit', $gym->id) . '" class="edit btn btn-info btn-sm mr-3 text-white"><i class="fas fa-pencil-alt mr-2"> </i>Edit</a>';
                    $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id="' . $gym->id . '"  data-bs-toggle="modal" data-bs-target="#deleteAlert">Delete</a>';
                    return $Btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('menu.gyms.index');
    }


    public function create()
    {
        // City::leftJoin('city_managers', 'cities.id', '=', 'city_managers.city_id')->where('city_id',null)->get();
        $cities = City::all();
        $gymManagers = GymManager::with('user')->where('gym_id', null)->get();
        return view('menu.gyms.create', compact('gymManagers', 'cities'));
    }


    public function store(StoreGymRequest $request)
    {
        if (request()->hasFile('cover_image'))
        {
            $img = request()->file('cover_image');
            $name = 'img-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('/images/gyms/'),$name);
        }
        // $validated = $request->validated();
        // insert new record in gyms table
        $gym = Gym::create([
            'cover_image' => $name,
            'name' => request()->name,
            'city_manager_id' => City::leftJoin('city_managers', 'cities.id', '=', 'city_managers.city_id')->where('city_id', request()->city)->get()->first()->user_id,
            'city_id' => request()->city_id,
        ]);
        
        // what if this manager is banned ?
        // what about multiple gym managers ?
        // insert the id of the gym in gym_managers table as a fk
        GymManager::where('user_id', request()->gym_manager)->update([
            'gym_id' => $gym->id,
        ]);
        return redirect()->route('gyms.index');
    }




    public function show($id)
    {
        $gym = Gym::find($id);
        $cityManager = Gym::with('city_managers')->where('id', $id)->first()->city_managers->user;
        $gymManager =  GymManager::where('gym_id', $id)->get()->first();
        return view('menu.gyms.show', compact(['gym', 'cityManager', 'gymManager']));
    }

    public function edit($id)
    {
        $gym = Gym::find($id);
        if (Gym::with('gym_managers')->find($id)->gym_managers->first()) {
            $gymManager = Gym::with('gym_managers')->find($id)->gym_managers->first()->user;
        } else {
            $gymManager = null;
        }
        $cities = City::all();
        $gymManagers = GymManager::with('user')->where('gym_id', null)->get();
        return view('menu.gyms.edit', compact('gymManagers', 'cities', 'gym', 'gymManager'));
        
        // $gymManagers = GymManager::leftJoin('gyms', 'gym_managers.gym_id', '=', 'gyms.id')->where('gym_id',null)->get();
        // return view('menu.gyms.edit', compact(['gym', 'gymManagers']));
    }

    public function update(UpdateGymRequest $request, $id)
    {
        $gym = Gym::find($id);
        if (request()->hasFile('avatar_image')) {
            $img = request()->file('avatar_image');
            $name = $gym->avatar_image;
            $img->move(public_path('/images/gyms/'), $name);
            Gym::find($id)->update([
                'cover_image' => $name,
            ]);
        } else {
            //
        }

        Gym::find($id)->update([
            'name' => request()->name,
            'city_manager_id' => City::leftJoin('city_managers', 'cities.id', '=', 'city_managers.city_id')->where('city_id', request()->city)->get()->first()->user_id,
            'city_id' => request()->city_id,
        ]);
        GymManager::where('user_id', request()->gym_manager)->update([
            'gym_id' => $gym->id,
        ]);
        return view('menu.gyms.index');
    }

    public function destroy($id)
    {
        if (isNull(Gym::with('training_sessions')->where('id', $id)->first()->training_sessions)) {
            Gym::find($id)->delete();
            return response()->json(['success' => 'Gym is deleted Successfully']);
        } else {
            return response()->json(['fail' => 'Can\'t delete Gym Right Now !']);
        }
    }
}
