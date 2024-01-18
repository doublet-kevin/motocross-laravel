<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
use App\Http\Controllers\CircuitController;
use App\Http\Controllers\TrainingController;
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

// Club routes

Route::get(
    '/clubs',
    [ClubController::class, 'index']
)->name('clubs.index');

Route::get(
    '/create-club',
    [ClubController::class, 'create']
)->name('club.create');

Route::post(
    '/store-club',
    [ClubController::class, 'store']
)->name('club.store');

Route::get(
    '/edit-club/{id}',
    [ClubController::class, 'edit']
)->name('club.edit');

Route::put(
    '/edit-club/{id}',
    [ClubController::class, 'update']
)->name('club.update');

Route::delete(
    '/delete-club/{id}',
    [ClubController::class, 'destroy']
)->name('club.destroy');


// Circuit routes

Route::get(
    '/circuits',
    [CircuitController::class, 'index']
)->name('circuits.index');

Route::get(
    '/create-circuit',
    [CircuitController::class, 'create']
)->name('circuit.create');

Route::post(
    '/store-circuit',
    [CircuitController::class, 'store']
)->name('circuit.store');

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
)->name('trainings.index');

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