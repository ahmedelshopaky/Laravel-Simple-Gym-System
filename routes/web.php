<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GymManagerController;
use App\Http\Controllers\TrainingPackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CityManagerController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\BuyPackageController;
use App\Http\Controllers\GymMemberController;
use App\Models\Gym;
use App\Models\GymMember;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('/gym-managers')->group(function () {
        Route::get('/', [GymManagerController::class, 'index'])->name('gym-managers.index');
    });

    Route::prefix('/city-managers')->group(function () {
        Route::get('/', [CityManagerController::class, 'index'])->name('city-managers.index');
        
    });

    Route::prefix('/gym-members')->group(function () {
        Route::get('/', [GymMemberController::class, 'index'])->name('gym-members.index');
    });

    Route::prefix('/users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');

        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });


    Route::get('/cities', [GymController::class, 'showCity'])->name('cities.show');

    Route::prefix('/gyms')->group(function(){
        Route::get('/', [GymController::class, 'index'])->name('gyms.index');
        Route::get('/create',[GymController::class,'create'])->name('gyms.create');
        Route::post('/',[GymController::class,'store'])->name('gyms.store');
        Route::get('/{id}',[GymController::class,'show'])->name('gyms.show');

        Route::get('/{id}/edit',[GymController::class,'edit'])->name('gyms.edit');
        Route::put('/{id}',[GymController::class,'update'])->name('gyms.update');
        Route::delete('/{id}',[GymController::class,'destroy'])->name('gyms.destroy');
    });

    Route::get('/training-packages', [TrainingPackageController::class, 'index'])->name('training-packages.index');

    Route::get('/coaches', [CoachController::class, 'index'])->name('coaches.index');

    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

    Route::get('/buy-package', [BuyPackageController::class, 'index'])->name('buy-package.index');

    Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue.index');
});