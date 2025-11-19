<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\VehicleImage;
use Illuminate\Http\Request;


class VehicleImageController extends Controller
{
    public function destroy(Vehicle $vehicle, VehicleImage $image)
{
    $image->delete();
    return back()->with('success', 'Imagen eliminada correctamente.');
}

public function setMain(Vehicle $vehicle, VehicleImage $image)
{
    // Desmarcar todas las imágenes como principal
    $vehicle->images()->update(['is_main' => 0]);
    // Marcar la seleccionada como principal
    $image->is_main = 1;
    $image->save();

    return back()->with('success', 'Imagen principal actualizada.');
}
}
