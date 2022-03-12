<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGymMemberRequest;
use App\Http\Resources\UserResource;
use App\Models\GymMember;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function register(StoreGymMemberRequest $request)
    {
        $data = request()->all();

        $img = request()->file('avatar_image');
        $name = 'img-' . uniqid() . '.' . $img->getClientOriginalExtension();
        
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'national_id' => $data['national_id'],
            'avatar_image' => $name,
            'role' => 'gym_member',
        ]);

        $img->move(public_path('images/users'),$name);
        
        $gymMember = GymMember::create([
            'user_id' => $user->id,
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],

        ]);

        event(new Registered($user));

        return [
            'message' => 'You are registered successfully',
            'your data' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'national_id' => $user->national_id,
                'gender' => $gymMember->gender,
                'birth_date' => $gymMember->date_of_birth,
            ]
        ];
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        
        $token = $user->createToken($request->email)->plainTextToken;

        GymMember::where('user_id', $user->id)
            ->update(['last_login' => Carbon::now()]);
        
        return [
            'message' => 'Welcome you are logged in',
            'token' => $token,
        ];
    }
}
