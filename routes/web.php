<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

//User Circuits routes
Route::resource('circuit', CircuitController::class)->only([
    'index', 'show'
]);

//Admin Circuits routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('circuit', CircuitController::class)->only([
        'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'create' => 'circuit.create',
        'destroy' => 'circuit.destroy',
        'edit' => 'circuit.edit',
        'update' => 'circuit.update',
        'store' => 'circuit.store'
    ]);
    Route::get('circuits', [CircuitController::class, 'board'])->name('circuit.board');
});

//User Training routes
Route::resource('training', TrainingController::class)->only([
    'index', 'show'
]);

//Admin Training routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('training', TrainingController::class)->only([
        'create', 'destroy', 'edit', 'update', 'store', 'index'
    ])->names([
        'create' => 'training.create',
        'destroy' => 'training.destroy',
        'edit' => 'training.edit',
        'update' => 'training.update',
        'store' => 'training.store',
    ]);
    Route::get('trainings', [TrainingController::class, 'board'])->name('training.board');
});


//User User routes
Route::resource('user', UserController::class)->only([
    'show', 'create', 'destroy', 'edit', 'store', 'update'
]);

//Admin User routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('users', [UserController::class, 'board'])->name('user.board');
});

//Admin Role routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('role', RoleController::class)->only([
        'index', 'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'index' => 'role.index',
        'create' => 'role.create',
        'destroy' => 'role.destroy',
        'edit' => 'role.edit',
        'update' => 'role.update',
        'store' => 'role.store'
    ]);
});

//Admin License routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('license', LicenseController::class)->only([
        'index', 'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'index' => 'license.index',
        'create' => 'license.create',
        'destroy' => 'license.destroy',
        'edit' => 'license.edit',
        'update' => 'license.update',
        'store' => 'license.store'
    ]);
    Route::get('licenses', [LicenseController::class, 'board'])->name('license.board');
});

//User Registration routes
Route::resource('registration', RegistrationController::class)->middleware('auth')->only([
    'store'
]);
//Admin Registration routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::resource('registration', RegistrationController::class)->only([
        'index', 'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'index' => 'registration.index',
        'create' => 'registration.create',
        'destroy' => 'registration.destroy',
        'edit' => 'registration.edit',
        'update' => 'registration.update',
    ]);
});
