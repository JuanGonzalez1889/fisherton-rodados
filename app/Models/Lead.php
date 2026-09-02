<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'apellido',
        'dni',
        'email',
        'phone',
        'message',
        'vehicle_id',
        'otro_marca',
        'otro_modelo',
        'otro_anio',
        'categoria_vehiculo',
        'status',
        'origen',
        'ultima_hora_contacto',
    ];

    protected $casts = [
        'ultima_hora_contacto' => 'datetime',
    ];

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function vendedor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function notas(): HasMany
    {
        return $this->hasMany(LeadNote::class);
    }
}
