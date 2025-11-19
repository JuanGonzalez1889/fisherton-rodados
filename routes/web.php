<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VehicleImageController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vehiculos', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehiculos/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');
Route::post('/consultas', [LeadController::class, 'store'])->name('leads.store');
Route::post('/contacto/enviar', [ContactController::class, 'send'])->name('contact.send');
Route::delete('/vehiculos/{vehicle}/imagenes/{image}', [VehicleImageController::class, 'destroy'])->name('vehicles.images.delete');
Route::post('/vehiculos/{vehicle}/imagenes/{image}/principal', [VehicleImageController::class, 'setMain'])->name('vehicles.images.setMain');

Route::view('/nosotros', 'about')->name('about');
Route::view('/contacto', 'contact')->name('contact');
