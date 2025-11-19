<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand',
        'model',
        'year',
        'price',
        'kilometers',
        'fuel_type',
        'transmission',
        'color',
        'description',
        'category',
        'featured',
        'available',
    ];
protected $with = ['vehicleImages'];

    protected $casts = [
        'featured' => 'boolean',
        'available' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function leads(): HasMany
    {
        return $this->hasMany(Lead::class);
    }
    
public function vehicleImages()
{
    return $this->hasMany(VehicleImage::class, 'vehicle_id');
}

    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 0, ',', '.');
    }

  public function getMainImageAttribute(): string
{
    $images = $this->vehicleImages ?? collect(); // <-- CAMBIO AQUÍ
    $main = $images->where('is_main', 1)->first();
    if ($main) {
        return asset('storage/' . $main->url);
    }
    $first = $images->first();
    if ($first) {
        return asset('storage/' . $first->url);
    }
    return asset('images/placeholder-car.jpg');
}
}