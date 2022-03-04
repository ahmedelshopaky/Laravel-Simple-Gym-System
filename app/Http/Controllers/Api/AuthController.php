<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GymMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function register(Request $request){

        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'national_id' => 'required|min:14',
            'avatar_image' => 'required|mimes:png,jpg|max:2048',
            'gender' => 'required',
            'date_of_birth' => 'required',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'national_id' => $data['national_id'],
            'avatar_image' => $request->file('avatar_image')->store('/public/images/users'),

            //$data['avatar_image'],
            
        ]);

        $gymMember = GymMember::create([
            'user_id' => $user->id,
            'gender' => $data['gender'],
            'date_of_birth' => $data['date_of_birth'],

        ]);

        event(new Registered($user));


        return response([
            'user' => $user,
            'member' => $gymMember,
        ]);
    }

    public function login(Request $request){

        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email' , $data['email'])->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
        return $user->createToken($request->email)->plainTextToken;


    }
}
