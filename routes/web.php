<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\VehicleController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('drivers', DriverController::class)->middleware('auth');
Route::resource('owners', OwnerController::class)->middleware('auth');

Route::resource('vehicles', VehicleController::class);

Route::get('vehicles/{vehicle}/assign-driver', [VehicleController::class, 'assignDriverForm'])->name('vehicles.assign_driver_form');
Route::post('vehicles/{vehicle}/assign-driver', [VehicleController::class, 'assignDriver'])->name('vehicles.assign_driver');

Route::get('vehicles/{vehicle}/assign-owner', [VehicleController::class, 'assignOwnerForm'])->name('vehicles.assign_owner_form');
Route::post('vehicles/{vehicle}/assign-owner', [VehicleController::class, 'assignOwner'])->name('vehicles.assign_owner');