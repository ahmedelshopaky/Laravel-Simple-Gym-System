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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::get('/home/gym-managers', [App\Http\Controllers\GymManagerController::class, 'index'])->name('gym_managers.index');
Route::get('/home/city-managers', [App\Http\Controllers\CityManagerController::class, 'index'])->name('city_managers.index');
Route::get('/home/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/home/cities', [App\Http\Controllers\CityController::class, 'index'])->name('cities.index');
Route::get('/home/gyms', [App\Http\Controllers\GymController::class, 'index'])->name('gyms.index');
Route::get('/home/training-packages', [App\Http\Controllers\TrainingPackageController::class, 'index'])->name('training_packages.index');
Route::get('/home/coaches', [App\Http\Controllers\CoachController::class, 'index'])->name('coaches.index');
Route::get('/home/attendance', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.index');
Route::get('/home/buy-package', [App\Http\Controllers\BuyPackageController::class, 'index'])->name('buy_package.index');
Route::get('/home/revenue', [App\Http\Controllers\RevenueController::class, 'index'])->name('revenue.index');
