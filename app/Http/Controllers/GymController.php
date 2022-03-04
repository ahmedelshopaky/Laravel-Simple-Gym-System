<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGymRequest;
use App\Http\Requests\UpdateGymRequest;
use App\Models\CityManager;
use App\Models\Gym;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use function PHPUnit\Framework\isNull;

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
        $users=CityManager::with('user')->get();
        return view('menu.gyms.create',compact('users'));
    }
    public function store(StoreGymRequest $request)
    {
        if (request()->hasFile('cover_image'))
        {
            $img = request()->file('cover_image');
            $name = 'img-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/gyms'),$name);

        }
        Gym::create(request()->all());
        return view('menu.gyms.index');
    }
    public function show($id)
    {   
        $gym=Gym::find($id);
        $user=Gym::with('city_managers')->where('id',$id)->first()->city_managers->user;
        return view('menu.gyms.show',compact(['gym','user']));
    }
    public function edit($id)
    {
        $modifyGym=Gym::find($id);
        $users=CityManager::with('user')->get();
        return view('menu.gyms.edit',compact('users','modifyGym'));
    }
    public function update(UpdateGymRequest $request,$id)
    {
        Gym::find($id)->update(request()->all());
        return view('menu.gyms.index');
    }
    public function destroy($id)
    {
        if(isNull(Gym::with('training_sessions')->where('id',$id)->first()->training_sessions))
        {
            Gym::find($id)->delete();
            return response()->json(['success'=>'Gym is deleted Successfully']);
        }
        else
        {
            return response()->json(['fail'=>'Can\'t delete Gym Right Now !']);
        }

    }
    
    public function showCity(Request $request) {
        $cities = Gym::with('city_managers')->get();
        $name=Gym::with('city_managers')->get()->first()->city_managers->user->name;
        dd($name);
        if ($request->ajax()) {
           
            return Datatables::of($cities)->addIndexColumn()
                    ->addColumn('action', function($gym){
                        $Btn = '<a href="" class="view btn btn-primary btn-sm mr-3 "> <i class="fas fa-folder"> </i>View</a>';
                        $Btn .= '<a href="" class="edit btn btn-info btn-sm mr-3"> <i class="fas fa-pencil-alt"> </i> Edit</a>';
                        $Btn .= '<a href="javascript:void(0)"  class="btn btn-danger btn-sm mr-3 delete"  data-id=""  data-bs-toggle="modal" data-bs-target="#deleteAlert"> <i class="fas fa-trash">  </i>Delete</a>';
                        return $Btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
      
        return view('menu.cities');
    }
}