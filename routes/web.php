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

<<<<<<< HEAD
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
=======
Route::get(
    '/edit-circuit/{id}',
    [CircuitController::class, 'edit']
)->name('circuit.edit');

Route::put(
    '/edit-circuit/{id}',
    [CircuitController::class, 'update']
)->name('circuit.update');

Route::delete(
    '/delete-circuit/{id}',
    [CircuitController::class, 'destroy']
)->name('circuit.destroy');


// Training routes

Route::get(
    '/trainings',
    [TrainingController::class, 'index']
)->name('training.index');

Route::get(
    '/create-training',
    [TrainingController::class, 'create']
)->name('training.create');

Route::post(
    '/store-training',
    [TrainingController::class, 'store']
)->name('training.store');

Route::get(
    '/edit-training/{id}',
    [TrainingController::class, 'edit']
)->name('training.edit');

Route::put(
    '/edit-training/{id}',
    [TrainingController::class, 'update']
)->name('training.update');


Route::delete(
    '/delete-training/{id}',
    [TrainingController::class, 'destroy']
)->name('training.destroy');

// User routes 

Route::get(
    '/user',
    [UserController::class, 'index']
)->name('user.index');

Route::get(
    '/user/create',
    [UserController::class, 'create']
)->name('user.create');

Route::post(
    '/user/store',
    [UserController::class, 'store']
)->name('user.store');

Route::get(
    '/user/edit/{id}',
    [UserController::class, 'edit']
)->name('user.edit');

Route::post(
    '/user/update/{id}',
    [UserController::class, 'update']
)->name('user.update');

Route::get(
    '/user/destroy/{id}',
    [UserController::class, 'destroy']
)->name('user.destroy');

Route::get(
    '/user/show/{id}',
    [UserController::class, 'show']
)->name('user.show');

// Role routes

Route::get(
    '/role',
    [RoleController::class, 'index']
)->name('role.index');

Route::get(
    '/role/create',
    [RoleController::class, 'create']
)->name('role.create');

Route::post(
    '/role/store',
    [RoleController::class, 'store']
)->name('role.store');

Route::get(
    '/role/edit/{id}',
    [RoleController::class, 'edit']
)->name('role.edit');

Route::post(
    '/role/update/{id}',
    [RoleController::class, 'update']
)->name('role.update');

Route::get(
    '/role/destroy/{id}',
    [RoleController::class, 'destroy']
)->name('role.destroy');

// License routes

Route::get(
    '/license',
    [LicenseController::class, 'index']
)->name('license.index');

Route::get(
    '/license/create',
    [LicenseController::class, 'create']
)->name('license.create');

Route::post(
    '/license/store',
    [LicenseController::class, 'store']
)->name('license.store');

Route::get(
    '/license/edit/{id}',
    [LicenseController::class, 'edit']
)->name('license.edit');

Route::post(
    '/license/update/{id}',
    [LicenseController::class, 'update']
)->name('license.update');

Route::get(
    '/license/destroy/{id}',
    [LicenseController::class, 'destroy']
)->name('license.destroy');

// Registration routes

Route::get(
    '/registration',
    [RegistrationController::class, 'index']
)->name('registration.index');

Route::get(
    '/registration/create',
    [RegistrationController::class, 'create']
)->name('registration.create');

Route::post(
    '/registration/store',
    [RegistrationController::class, 'store']
)->name('registration.store');

Route::get(
    '/registration/edit/{id}',
    [RegistrationController::class, 'edit']
)->name('registration.edit');

Route::post(
    '/registration/update/{id}',
    [RegistrationController::class, 'update']
)->name('registration.update');

Route::get(
    '/registration/destroy/{id}',
    [RegistrationController::class, 'destroy']
)->name('registration.destroy');

Route::get(
    '/registration/show/{id}',
    [RegistrationController::class, 'show']
)->name('registration.show');
>>>>>>> 0bec3be (fix(route): update web.php)
