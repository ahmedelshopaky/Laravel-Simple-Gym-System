<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GymManagerController;
use App\Http\Controllers\TrainingPackageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CityManagerController;
use App\Http\Controllers\RevenueController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\BuyPackageController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\GymMemberController;
use App\Http\Controllers\TrainingSessionController;
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
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    Route::group(['prefix' => '/gym-managers', 'middleware' => 'auth', 'role:admin|cityManager'], function () {
        Route::get('/', [GymManagerController::class, 'index'])->name('gym-managers.index');
        Route::get('/create', [GymManagerController::class, 'create'])->name('gym-managers.create');
        Route::get('/{id}/edit', [GymManagerController::class, 'edit'])->name('gym-managers.edit');

        Route::put('/{id}/ban', [GymManagerController::class, 'bam'])->name('gym-managers.ban');
        Route::put('/{id}/unban', [GymManagerController::class, 'unban'])->name('gym-managers.unban');
    });

    Route::group(['prefix' => '/city-managers', 'middleware' => 'auth', 'forbid-banned-user', 'role:admin'], function () {
        Route::get('/', [CityManagerController::class, 'index'])->name('city-managers.index');
        Route::get('/create', [CityManagerController::class, 'create'])->name('city-managers.create');
        Route::get('/{id}/edit', [CityManagerController::class, 'edit'])->name('city-managers.edit');
    });

    Route::prefix('/gym-members')->group(function () {
        Route::get('/', [GymMemberController::class, 'index'])->name('gym-members.index');
        Route::get('/create', [GymMemberController::class, 'create'])->name('gym-members.create');
        Route::get('/{id}', [GymMemberController::class, 'show'])->name('gym-members.show');

        Route::get('/{id}/edit', [GymMemberController::class, 'edit'])->name('gym-members.edit');
    });


    Route::group(['prefix' => '/users', 'middleware' => 'auth', 'forbid-banned-user', 'role:admin|cityManager|gymManager'], function () {
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/', [UserController::class, 'store'])->name('users.store');

        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('users.update');
        Route::get('/{id}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });

    Route::prefix('/cities')->group(function () {
        Route::get('/', [CityController::class, 'index'])->name('cities.index');
    });

    Route::group(['prefix' => '/gyms', 'middleware' => 'auth', 'forbid-banned-user', 'role:admin|cityManager'], function () {
        Route::get('/', [GymController::class, 'index'])->name('gyms.index');
        Route::get('/create', [GymController::class, 'create'])->name('gyms.create');
        Route::post('/', [GymController::class, 'store'])->name('gyms.store');
        Route::get('/{id}', [GymController::class, 'show'])->name('gyms.show');

        Route::get('/{id}/edit', [GymController::class, 'edit'])->name('gyms.edit');
        Route::put('/{id}', [GymController::class, 'update'])->name('gyms.update');
        Route::delete('/{id}', [GymController::class, 'destroy'])->name('gyms.destroy');
    });

    Route::prefix('/training-packages')->group(function () {
        Route::get('/', [TrainingPackageController::class, 'index'])->name('training-packages.index');
        Route::get('/create', [TrainingPackageController::class, 'create'])->name('training-packages.create');
        Route::post('/', [TrainingPackageController::class, 'store'])->name('training-packages.store');
    });

    Route::prefix('/coaches')->group(function () {
        Route::get('/', [CoachController::class, 'index'])->name('coaches.index');
        Route::get('/create', [CoachController::class, 'create'])->name('coaches.create');
        Route::post('/', [CoachController::class, 'store'])->name('coaches.store');
    });

    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

    Route::group(['prefix' => '/buy-package', 'middleware' => 'auth', 'forbid-banned-user', 'role:admin'], function () {
        Route::get('/create', [BuyPackageController::class, 'create'])->name('buy-package.create');
        Route::post('/', [BuyPackageController::class, 'store'])->name('buy-package.store');
    });

    Route::get('/revenue', [RevenueController::class, 'index'])->name('revenue.index');


    Route::group(['prefix' => '/training-sessions', 'middleware' => 'auth', 'forbid-banned-user', 'role:admin|cityManager|gymManager'], function () {
        Route::prefix('/revenue')->group(function () {
            Route::get('/', [RevenueController::class, 'index'])->name('revenue.index');
        });

        Route::prefix('/training-sessions')->group(function () {
            Route::get('/', [TrainingSessionController::class, 'index'])->name('training-sessions.index');

            Route::get('/create', [TrainingSessionController::class, 'create'])->name('training-sessions.create');
            Route::post('/', [TrainingSessionController::class, 'store'])->name('training-sessions.store');

            Route::get('/{id}', [TrainingSessionController::class, 'show'])->name('training-sessions.show');

            Route::get('/{id}/edit', [TrainingSessionController::class, 'edit'])->name('training-sessions.edit');
            Route::put('/{id}', [TrainingSessionController::class, 'update'])->name('training-sessions.update');

            Route::delete('/{id}', [TrainingSessionController::class, 'destroy'])->name('training-sessions.destroy');
        });
        //Ban actions
        // Route::get('/banned',[BannedController::class,'index'])->name('BannedController.ban');
    });
});
