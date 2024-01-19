<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\RegistrationController;

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
});


//User Circuits routes
Route::resource('circuits', CircuitController::class)->only([
    'index', 'show'
]);

//Admin Circuits routes
Route::resource('circuits', CircuitController::class)->only([
    'create', 'destroy', 'edit', 'update', 'store'
])->names([
    'create' => 'admin.circuit.create',
    'destroy' => 'admin.circuit.destroy',
    'edit' => 'admin.circuit.edit',
    'update' => 'admin.circuit.update',
    'store' => 'admin.circuit.store'
]);

//User Training routes
Route::resource('trainings', TrainingController::class)->only([
    'index', 'show'
]);

//Admin Training routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('trainings', TrainingController::class)->only([
        'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'create' => 'training.create',
        'destroy' => 'training.destroy',
        'edit' => 'training.edit',
        'update' => 'training.update',
        'store' => 'training.store'
    ]);
});


//User User routes
Route::resource('users', UserController::class)->only([
    'show'
]);

//Admin User routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('users', UserController::class)->only([
        'index', 'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'index' => 'user.index',
        'create' => 'user.create',
        'destroy' => 'user.destroy',
        'edit' => 'user.edit',
        'update' => 'user.update',
        'store' => 'user.store'
    ]);
});

//Admin Role routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('roles', RoleController::class)->only([
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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('licenses', LicenseController::class)->only([
        'index', 'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'index' => 'license.index',
        'create' => 'license.create',
        'destroy' => 'license.destroy',
        'edit' => 'license.edit',
        'update' => 'license.update',
        'store' => 'license.store'
    ]);
});

//Admin Registration routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('registrations', RegistrationController::class)->only([
        'index', 'create', 'destroy', 'edit', 'update', 'store'
    ])->names([
        'index' => 'registration.index',
        'create' => 'registration.create',
        'destroy' => 'registration.destroy',
        'edit' => 'registration.edit',
        'update' => 'registration.update',
        'store' => 'registration.store'
    ]);
});
