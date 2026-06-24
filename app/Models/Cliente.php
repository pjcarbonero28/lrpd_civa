<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    protected $fillable = [
        'dni',
        'nombre',
        'telefono',
        'direccion',
        'correo'
    ];

    public function encomiendas(): HasMany
    {
        return $this->hasMany(Encomienda::class);
    }
}