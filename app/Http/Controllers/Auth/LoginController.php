<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\GymManager;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    //         $gymManager=GymManager::where('user_id', Auth::id())->onlyBanned()->first();
    //         if ($gymManager->isBanned()) {
    //             Auth::logout();
    //             return redirect()->route('BanController.ban');
    //         }
    //     } elseif (!$user->hasAnyRole(['admin', 'cityManager', 'gymManager'])) {
    //         //dd('اتكل على الله يابا');
    //     }
    // }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
