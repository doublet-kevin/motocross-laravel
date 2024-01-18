<?php

use Illuminate\Support\Facades\Route;
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
    '/show/{id}',
    [UserController::class, 'show']
)->name('user.show');

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
    '/show/{id}',
    [RegistrationController::class, 'show']
)->name('registration.show');
