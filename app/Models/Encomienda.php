<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Encomienda extends Model
{
    protected $fillable = [
        'cliente_id',
        'codigo_seguimiento',
        'origen',
        'destino',
        'peso',
        'descripcion',
        'estado'
    ];

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pagos(): HasMany
    {
        return $this->hasMany(Pago::class);
    }

    public function seguimientos(): HasMany
    {
        return $this->hasMany(Seguimiento::class);
    }
}