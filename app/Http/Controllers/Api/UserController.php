<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateGymMemberRequest;
use App\Http\Resources\ApiUserAttendanceResource;
use App\Http\Resources\AttendanceResource;
use App\Http\Resources\GymResource;
use App\Http\Resources\TrainingSessionResource;
use App\Models\Attendance;
use App\Models\GymMember;
use App\Models\Revenue;
use App\Models\TrainingSession;
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
        
        if ($packages != null){
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

    public function attend($sessionId){

        $userId = Auth::id();
        $totalTrainingSessions = 0;

        $session = TrainingSession::find($sessionId);
        

        if($session == null){
            return "There is no session with this id ". $sessionId;
        }else{
            $packages = Revenue::with('training_packages')->where('gym_member_id',$userId)->get();
        
            if ($packages == null){

                return "you didn't buy any packages yet so you can't attend any sessions please buy package first";

            }else {
                foreach($packages as $package){
                    $totalTrainingSessions += $package->training_packages[0]->sessions_number;
                }
            
                $attendedSessions = Attendance::where('gym_member_id',$userId)->count();
    
                $remainingTrainingSessions = $totalTrainingSessions - $attendedSessions;

                if($remainingTrainingSessions == 0){
                    return "you don't have any remaining sessions please buy extra packages first";
                }else{
                    $today = now()->toDateString();

                    $sessionDate = date('Y-m-d',strtotime($session->starts_at));
                  
                    if($today == $sessionDate){
                        Attendance::create([
                            'gym_member_id' => $userId,
                            'training_session_id' => $session->id,
                        ]);
                        return "your request to attend this session is accepted,good luck";
                    }else{
                        return "you can't attend session it's date is before or after today's date ,
                            please choose another session that is running today";
                    }
                }
            }
        }  
    }

    public function viewHistory(){
        $userId = Auth::id();

        $trainingSessions = Attendance::with('training_session')->where('gym_member_id',$userId)->get();
     
        return [
            'your attendance history'=>ApiUserAttendanceResource::collection($trainingSessions)
            ] ;

    }
}
