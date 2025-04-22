<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout.submit'); 

// Route::middleware(['auth'])->group(function () {
//     Route::get('/admin/dashboard/cars', [AdminController::class, 'viewCars'])->name('admin.cars.index');
//     Route::get('/admin/dashboard/cars/{carId}/appointments', [AdminController::class, 'viewAppointments'])->name('admin.viewAppointments');
//     Route::get('/admin/dashboard/cars/{carId}/edit', [AdminController::class, 'editCar'])->name('admin.editCar');
//     Route::put('/admin/dashboard/cars/{carId}', [AdminController::class, 'updateCar'])->name('admin.updateCar');
//     Route::delete('/admin/dashboard/cars/{carId}', [AdminController::class, 'deleteCar'])->name('admin.deleteCar');
// });

// Route::get('/admin/dashboard/cars', [AdminController::class, 'viewCars'])->name('admin.cars.index');
// Route::get('/admin/dashboard/cars/{carId}/appointments', [AdminController::class, 'viewAppointments'])->name('admin.viewAppointments');
// Route::get('/admin/dashboard/cars/{carId}/edit', [AdminController::class, 'editCar'])->name('admin.editCar');
// Route::put('/admin/dashboard/cars/{carId}', [AdminController::class, 'updateCar'])->name('admin.updateCar');
// Route::delete('/admin/dashboard/cars/{carId}', [AdminController::class, 'deleteCar'])->name('admin.deleteCar');

// Protect the route with manual authentication check
Route::get('/admin/dashboard/cars', function () {
    if (!Auth::check()) {
        return redirect()->route('admin.login');  // Redirect to login if not authenticated
    }

    // Proceed to the AdminController for handling the cars listing
    return (new AdminController)->viewCars();
})->name('admin.cars.index');
