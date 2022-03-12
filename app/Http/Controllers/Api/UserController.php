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

    //you should use method post from postman but include ('_method => PUT') in the body fo 
    //the request this is due to errors of empty body of put method i hope they solve it soon
    

    // update user information

    public function update(UpdateGymMemberRequest $request)
    {
     
        $request->merge(['password' => Hash::make(request()->password)]);

        $userId = Auth::id();

        $userData = $request->only(['name', 'email','national_id','password']);

        User::where('id', $userId)
            ->update($userData);

        if($request->has('avatar_image')){
            $img = request()->file('avatar_image');
            $name = Auth::user()->avatar_image;
            $img->move(public_path('images/users'),$name);
        }
            
        $gymMemberData = $request->only(['gender', 'date_of_birth']);

        GymMember::where('user_id', $userId)->update($gymMemberData);

        $gymMember = GymMember::where('user_id', $userId)->first();
        $userObj= User::where('id', $userId)->first();

        return response([
            'message' => 'your data updated successfully',
            'Your new data' => [$userObj,$gymMember],
        ]);
    }


    //view total and remaining user training sessions 
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

    // function to allow user to attend a session
    public function attend($sessionId){

        $userId = Auth::id();
        $totalTrainingSessions = 0;
        $attendance = 0;

        $session = TrainingSession::find($sessionId);
        
        //validation for the session id 
        if($session == null){
            return response([ 
                'message' => "There is no session with this id ". $sessionId
            ]);

        }else{
            $packages = Revenue::with('training_packages')->where('gym_member_id',$userId)->get();
            
            // check if the user have bought any packages
            if ($packages == null){
                return response([ 
                    'message' =>  "you didn't buy any packages yet so you can't attend any sessions please buy package first"
                ]);
                
            }else {
                foreach($packages as $package){
                    if($package->gym_id == $session->gym_id)
                         $totalTrainingSessions += $package->training_packages[0]->sessions_number;
                }

                // check if the user have bought package in the gym where the session is held
                if($totalTrainingSessions == 0 ){
                    return response([ 
                        'message' =>  "you didn't buy any packages in the gym which have this session please buy package in this gym first"
                    ]);
                }
                  
                $attendedSessions = Attendance::with('training_session')->where('gym_member_id',$userId)->get();
               
                // check if the user has already attended this session before
                foreach($attendedSessions as $attendedSession){
                    if($attendedSession->training_session_id == $sessionId)
                        return response([ 
                            'message' =>  "you have already attended this session once please choose another session to attend"
                        ]);
                    }

                foreach($attendedSessions as $attendedSession){
                    if($attendedSession->training_session->gym_id == $session->gym_id)
                        $attendance += 1 ;
                    }
                
                $remainingTrainingSessions = $totalTrainingSessions - $attendance;
    
                //check if the user have consumed all his available session in the packages he has bought
                if($remainingTrainingSessions == 0){
                    return response([ 
                        'message' => "you consumed all your sessions in this gym please buy extra packages first or try to attend a session in another gym you have bought package from"
                    ]);
             
                }else{
                    $today = now()->toDateString();

                    $sessionDate = date('Y-m-d',strtotime($session->starts_at));
                    
                    //check if the date of the session is in the same date now
                    if($today == $sessionDate){
                        Attendance::create([
                            'gym_member_id' => $userId,
                            'training_session_id' => $session->id,
                        ]);
                        return response([ 
                            'message' => "your request to attend this session is accepted,good luck"
                        ]);
                    }else{
                        return response([ 
                            'message' => "you can't attend session it's date is before or after today's date ,please choose another session that is running today"
                        ]);
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
