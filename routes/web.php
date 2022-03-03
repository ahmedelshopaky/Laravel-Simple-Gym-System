<?php

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
Route::middleware('auth')->group(function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/gym-managers', [App\Http\Controllers\GymManagerController::class, 'index'])->name('gym-managers.index');
    Route::get('/gym-managers/edit', [App\Http\Controllers\GymManagerController::class, 'edit'])->name('gym-managers.edit');

    Route::get('/city-managers', [App\Http\Controllers\CityManagerController::class, 'index'])->name('city-managers.index');
    Route::get('/city-managers/edit', [App\Http\Controllers\GymManagerController::class, 'edit'])->name('city-managers.edit');

    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

    Route::get('/cities', [App\Http\Controllers\GymController::class, 'showCity'])->name('cities.show');

    Route::get('/gyms', [App\Http\Controllers\GymController::class, 'index'])->name('gyms.index');

    Route::get('/training-packages', [App\Http\Controllers\TrainingPackageController::class, 'index'])->name('training-packages.index');

    Route::get('/coaches', [App\Http\Controllers\CoachController::class, 'index'])->name('coaches.index');

    Route::get('/attendance', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.index');

    Route::get('/buy-package', [App\Http\Controllers\BuyPackageController::class, 'index'])->name('buy-package.index');
    
    Route::get('/revenue', [App\Http\Controllers\RevenueController::class, 'index'])->name('revenue.index');

    
    Route::get('/payment', function(){
        return view('payment');
    });

    Route::post('/payment', function(){
        
    });

});