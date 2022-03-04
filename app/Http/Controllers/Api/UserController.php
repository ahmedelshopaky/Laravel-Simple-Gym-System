<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGymMemberRequest;
use App\Http\Requests\StoreUserRequest;
use App\Models\GymMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return "helloo";
    }

    public function update($userId, StoreGymMemberRequest $request)
    {
        $token = $request->bearerToken();
        $data = request()->all();
        // $name = $request->input('name');

        // dd($data);
        $user= GymMember::where('remember_token', $token)->first(['user_id'])->user_id;

        $userObj=Auth::user();

        if ($userId == $user) {
            // dd($request->has('name'));
            User::where('id', $user)
                ->update([
            'name' => $request->has('name')? $data['name']:$userObj->name,
            'email' => $request->has('email')? $data['email']:$userObj->email,
            'national_id' => $request->has('national_id')? $data['national_id']:$userObj->national_id,
            'password' => $request->has('password')? Hash::make($data['password']):$userObj->password,
            'avatar_image' => $request->has('avatar_image')? $request->file('avatar_image')->store('uploads', 'public'):$userObj->avatar_image,]);

            GymMember::where('user_id', $user)->update([
            'gender' => $request->has('gender')? $data['gender']:$userObj->gender,
            'date_of_birth' => $request->has('date_of_birth')? $data['date_of_birth']:$userObj->date_of_birth,]);
        } else {
            return "you are not eligible to update";
        }
        // return $userObj->name;
    }
}

// 'password' => Hash::make($data['password']),
//             'national_id' => $data['national_id'],
//             'avatar_image' => $request->file('avatar_image')->store('uploads', 'public')
