<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'marca',
        'model',
        'matricula',
        'type',
        'is_active',
    ];

    // Relación muchos a muchos con drivers
    public function drivers()
    {
        return $this->belongsToMany(Driver::class, 'driver_vehicle');
    }

    // Relación muchos a muchos con owners
    public function owners()
    {
        return $this->belongsToMany(Owner::class, 'owner_vehicle');
    }
}
