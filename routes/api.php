<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MemberVerified;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class,'register']);

Route::post('login', [AuthController::class,'login']);




Route::get('/email/verify', function () {
    return  view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    // $user = Auth::user();
    // $user->notify(new MemberVerified);
    
})->middleware(['auth:sanctum'])->name('verification.verify');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [UserController::class,'index'])->middleware('verified');

    //you should use method post from postman but include ('_method => PUT') in the body fo 
    //the request this is due to errors of empty body of put method i hope they solve it soon
    Route::put('/profile/update', [UserController::class,'update'])->middleware('verified');

    Route::get('/training-sessions',[UserController::class,'view'])->middleware('verified');
});
    
    
  
