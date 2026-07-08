<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'dni',
        'telefono',
        'correo',
        'direccion',
    ];

    public function encomiendas()
    {
        return $this->hasMany(Encomienda::class, 'cliente_id');
    }
}