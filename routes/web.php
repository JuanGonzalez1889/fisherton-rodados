<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VehicleImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/vehiculos', [VehicleController::class, 'index'])->name('vehicles.index');
Route::get('/vehiculos/{vehicle}', [VehicleController::class, 'show'])->name('vehicles.show');
Route::post('/consultas', [LeadController::class, 'store'])->name('leads.store');
Route::post('/contacto/enviar', [ContactController::class, 'send'])->name('contact.send');
Route::delete('/vehiculos/{vehicle}/imagenes/{image}', [VehicleImageController::class, 'destroy'])->name('vehicles.images.delete');
Route::post('/vehiculos/{vehicle}/imagenes/{image}/principal', [VehicleImageController::class, 'setMain'])->name('vehicles.images.setMain');

Route::post('/admin/upload-diagnostics', function (Request $request) {
    abort_unless($request->user()?->isAdmin(), 403);

    $data = $request->validate([
        'event' => ['required', 'in:start,progress,finish,error,cancel'],
        'field' => ['nullable', 'string', 'max:120'],
        'size' => ['nullable', 'integer', 'min:0'],
        'mime' => ['nullable', 'string', 'max:120'],
        'progress' => ['nullable', 'integer', 'min:0', 'max:100'],
        'occurred_at' => ['required', 'date'],
    ]);

    Log::info('Image upload diagnostic', [
        'user_id' => $request->user()->id,
        ...$data,
    ]);

    return response()->noContent();
})->middleware(['auth', 'throttle:120,1'])->name('admin.upload-diagnostics');

Route::view('/nosotros', 'about')->name('about');
Route::view('/contacto', 'contact')->name('contact');
