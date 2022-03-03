<?php

namespace App\Http\Controllers;

use App\Models\GymManager;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\StoreUserRequest;
use App\Models\CityManager;
use App\Models\GymMember;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index(Request $request)
    {
        //
    }

    public function create() {
        return view('menu.user.create');
    }

    public function store(StoreUserRequest $request) {
        if (request()->hasFile('avatar_image'))
        {
            $img = request()->file('avatar_image');
            $name = 'img-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/users'),$name);
            
            // TODO
            // if $name == null
            // unlink((public_path('uploads/users')).$name);
            
            // image is already exists (in edit)
        }
        
        // validate the request data
        $validated = $request->validated();
        // store in db
        $user = User::create($validated);
        User::where('national_id', $request->national_id)->update([
            'avatar_image' => $name,
            'password' => Hash::make($request['password']),
            // 'role' => $request->role,
        ]);

        if ($request->role == 'city_manager'){
            CityManager::insert([
                'user_id' => $user->id,
                // 'role' => 'city_manager',
            ]);
            return redirect()->route('city-managers.index');
        } else if ($request->role == 'gym_manager'){
            GymManager::insert([
                'user_id' => $user->id,
                // 'role' => 'gym_manager',
            ]);
            return redirect()->route('gym-managers.index');
        } else if ($request->role == 'gym_member'){
            GymMember::insert([
                'user_id' => $user->id,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
                // 'role' => 'gym_member',
            ]);
            return redirect()->route('gym-members.index');
        }
    }

    public function edit($id) {
        $user = User::find($id);
        return view('menu.user.edit', compact('user'));
    }

    public function update($id, StoreUserRequest $request) {
        // TODO
        // avatar, role and gym member section old value ????
        $validated = $request->validated();

        $user = User::find($id);
        if ($user) {
            $user->update($validated);
        }
        return view('menu.user.show', compact('user'));
    }

    public function show($id) {
        
        // TODO
        // if it is a gym member, retrieve the rest of the data from gym_members table

        $user = User::find($id);
        return view('menu.user.show', compact('user'));
    }

    public function destroy() {
        //
    }
}
