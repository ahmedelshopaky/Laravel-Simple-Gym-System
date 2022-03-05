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
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UserController extends Controller
{
    use HasRoles;

    public function index(Request $request)
    {
        //
    }

    public function create()
    {
        return view('menu.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        if (request()->hasFile('avatar_image')) {
            $img = request()->file('avatar_image');
            $name = 'img-' . uniqid() . '.' . $img->getClientOriginalExtension();
            $img->move(public_path('images/users'), $name);
            
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
        ]);

        if ($request->role == 'city_manager') {
            CityManager::create([
                'user_id' => $user->id,
                'city_id' => $request->city,
                // 'role' => 'city_manager',
            ])->assignRole('cityManager')->givePermissionTo(['create gym','create gym manager','create coach','create session','edit gym manager','edit gym','edit coach','edit session','delete gym manager','delete gym','delete coach','delete session','show gym manager','show gym','show coach','show package','show session','show attendance','buy package','assign coach','ban gym manager','unban gym manager']) ;

            return redirect()->route('city-managers.index');
        } elseif ($request->role == 'gym_manager') {
            GymManager::create([
                'user_id' => $user->id,
                'gym_id' => $request->gym,
                // 'role' => 'gym_manager',
            ])->assignRole('gymManager')->givePermissionTo(['create session','edit session','delete session','show session','show coach','show package','show attendance','buy package','assign coach']);

            return redirect()->route('gym-managers.index');

        } elseif ($request->role == 'gym_member') {
            GymMember::insert([
                'user_id' => $user->id,
                'gender' => $request->gender,
                'date_of_birth' => $request->date_of_birth,
            ]);
            return redirect()->route('gym-members.index');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('menu.user.edit', compact('user'));
    }

    public function update($id, StoreUserRequest $request)
    {
        // TODO
        // avatar, role and gym member section old value ????
        $validated = $request->validated();

        $user = User::find($id);
        if ($user) {
            $user->update($validated);
        }
        return view('menu.user.show', compact('user'));
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('menu.user.show', compact('user'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['success'=>'This row id deleted successfully']);
    }
}
