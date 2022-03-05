<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGymMemberRequest;
use App\Models\Attendance;
use App\Models\GymMember;
use App\Models\Revenue;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{
    public function index()
    {
        return "helloo";
    }


    //you should use method post from postman but include ('_method => PUT') in the body fo 
    //the request this is due to errors of empty body of put method i hope they solve it soon
    
    public function update(UpdateGymMemberRequest $request)
    {
       // $token = $request->bearerToken();
        $request->merge(['password' => Hash::make(request()->password)]);

        $data = $request->except(['_method']);
        
       // $userId= GymMember::where('remember_token', $token)->first(['user_id'])->user_id;
        $userId = Auth::id();

        $data = $request->only(['name', 'email','national_id','password']);

        User::where('id', $userId)
            ->update($data);

        if($request->has('avatar_image')){
            $img = request()->file('avatar_image');
            $name = Auth::user()->avatar_image;

            User::where('id', $userId)
                ->update(['avatar_image' => $name]); 

            $img->move(public_path('images/users'),$name);
        }
            
        $data = $request->only(['gender', 'date_of_birth']);

        GymMember::where('user_id', $userId)->update($data);

        $gymMember = GymMember::where('user_id', $userId)->first();
        $userObj= User::where('id', $userId)->first();

        return response([
            'message' => 'your data updated successfully',
            'Your changed data' => [$userObj,$gymMember],
        ]);
    }

    public function view(){

        $userId = Auth::id();
        $totalTrainingSessions = 0;
         
        $packages = Revenue::with('training_packages')->where('gym_member_id',$userId)->get();
        
        if (!isNull($packages)){
            foreach($packages as $package){
                $totalTrainingSessions += $package->training_packages[0]->sessions_number;
            }
        
            $attendedSessions = Attendance::where('gym_member_id',$userId)->count();

            $remainingTrainingSessions = $totalTrainingSessions - $attendedSessions;
        }else {
            return "you didn't buy any packages yet so you don't have any sessions please buy package first";
        }

      return response()->json([
          'Total training sessions' => $totalTrainingSessions,
          'Remaining training sessions' => $remainingTrainingSessions,
      ]);
    }
}
