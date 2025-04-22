<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit'); 

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard/cars', [AdminController::class, 'viewCars'])->name('admin.cars.index');
    Route::get('/admin/dashboard/cars/{carId}/appointments', [AdminController::class, 'viewAppointments'])->name('admin.viewAppointments');
    Route::get('/admin/dashboard/cars/{carId}/edit', [AdminController::class, 'editCar'])->name('admin.editCar');
    Route::put('/admin/dashboard/cars/{carId}', [AdminController::class, 'updateCar'])->name('admin.updateCar');
    Route::delete('/admin/dashboard/cars/{carId}', [AdminController::class, 'deleteCar'])->name('admin.deleteCar');
});
