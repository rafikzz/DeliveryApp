<?php

use App\Http\Controllers\AssignDeliveryController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;

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

Route::get('/', function () {
    return view('welcome');
});
//For Dashboard
Route::view('dashboard', 'dashboard');
// For Driver



Route::resource('drivers', DriverController::class);

// For Vehicle

Route::resource('/vehicles',VehicleController::class);

Route::resource('deliveries', DeliveryController::class);

Route::get('deliveries/{delivery}/assign', [AssignDeliveryController::class,'assign'])->name('deliveries.assign');
Route::post('deliveries/assign', [AssignDeliveryController::class,'store'])->name('assigndeliveries.store');
