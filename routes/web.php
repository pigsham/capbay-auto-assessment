<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\AppointmentController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout.submit'); 

# Car Routes
Route::get('/admin/dashboard/cars', [CarController::class, 'index'])->name('admin.cars.index');
Route::get('/admin/dashboard/cars/create', [CarController::class, 'create'])->name('admin.cars.create');
Route::post('/admin/dashboard/cars', [CarController::class, 'store'])->name('admin.cars.store');
Route::get('/admin/dashboard/cars/{carId}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
Route::put('/admin/dashboard/cars/{carId}', [CarController::class, 'update'])->name('admin.cars.update');
Route::delete('/admin/dashboard/cars/{carId}', [CarController::class, 'destroy'])->name('admin.cars.destroy');

// Appointments routes
Route::get('admin/cars/{carId}/appointments', [AppointmentController::class, 'index'])->name('admin.appointments.index');
Route::get('admin/cars/{carId}/appointments/{appointmentId}/edit', [AppointmentController::class, 'edit'])->name('admin.appointments.edit');
Route::put('admin/cars/{carId}/appointments/{appointmentId}', [AppointmentController::class, 'update'])->name('admin.appointments.update');
Route::delete('admin/cars/{carId}/appointments/{appointmentId}', [AppointmentController::class, 'destroy'])->name('admin.appointments.destroy');

Route::get('admin/cars/{carId}/appointments/create', [AppointmentController::class, 'create'])->name('admin.appointments.create');
Route::post('admin/cars/{carId}/appointments', [AppointmentController::class, 'store'])->name('admin.appointments.store');