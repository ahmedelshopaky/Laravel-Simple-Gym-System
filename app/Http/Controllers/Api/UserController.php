<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGymMemberRequest;
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

    public function update($Id,UpdateGymMemberRequest $request)
    {
        $token = $request->bearerToken();
        $request->merge(['password' => Hash::make(request()->password)]);

        $data = $request->except(['_method']);
        

        $userId= GymMember::where('remember_token', $token)->first(['user_id'])->user_id;
        $gymMember = GymMember::where('user_id', $userId)->first();
        $userObj=Auth::user();


        if ($Id == $userId) {

            $data = $request->only(['name', 'email','national_id','password']);

            User::where('id', $userId)
                 ->update($data);

            User::where('id', $userId)
                 ->update(['avatar_image' => $request->has('avatar_image')? $request->file('avatar_image')->store('uploads', 'public'):$userObj->avatar_image]);   
            
            $data = $request->only(['gender', 'date_of_birth']);

            GymMember::where('user_id', $userId)->update($data);

        } else {
            return "you are not eligible to update data of another user please enter your id in the url";
        }

        return response([
            'message' => 'your data updated successfully',
            'Your new data' => [$userObj,$gymMember],
        ]);
    }
}
