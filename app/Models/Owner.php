<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nif_cif',
        'direccion',
        'codigo_postal',
        'provincia',
        'localidad',
        'telefono',
    ];

    // Relación muchos a muchos con vehicles
    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class, 'owner_vehicle');
    }
}
