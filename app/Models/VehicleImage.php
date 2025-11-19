<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VehicleImage extends Model
{
    protected $fillable = ['vehicle_id', 'url', 'is_main'];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    // Lógica para que solo una imagen sea principal por vehículo
    protected static function booted()
    {
        static::saving(function ($image) {
            if ($image->is_main) {
                static::where('vehicle_id', $image->vehicle_id)
                    ->where('id', '!=', $image->id)
                    ->update(['is_main' => 0]);
            }
        });
    }
}