<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GymManager;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //check if gymManager is banned or not on login
    // public function authenticated(Request $request, $user)
    // {
    //     if ($user->hasRole('gymManager')) {
    //         $gymManager = GymManager::findOrFail($user->role_id);
    //         if ($gymManager->isBanned()) {
    //             return to_route('BannedController.ban');
    //         }
    //     }
    // }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
