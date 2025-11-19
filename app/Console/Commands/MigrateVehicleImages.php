<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vehicle;
use App\Models\VehicleImage;

class MigrateVehicleImages extends Command
{
    protected $signature = 'migrate:vehicle-images';
    protected $description = 'Migra las imágenes del campo images al modelo VehicleImage';

    public function handle()
    {
        $vehicles = Vehicle::all();
        $count = 0;

        foreach ($vehicles as $vehicle) {
            if (is_array($vehicle->images) && count($vehicle->images)) {
                foreach ($vehicle->images as $img) {
                    // Evita duplicados
                    if (!VehicleImage::where('vehicle_id', $vehicle->id)->where('url', $img)->exists()) {
                        VehicleImage::create([
                            'vehicle_id' => $vehicle->id,
                            'url' => $img,
                        ]);
                        $count++;
                    }
                }
            }
        }

        $this->info("Migración completada. Se migraron $count imágenes.");
    }
}