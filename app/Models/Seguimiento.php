<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Seguimiento extends Model
{
    protected $fillable = [
        'encomienda_id',
        'estado',
        'ubicacion',
        'observacion'
    ];

    public function encomienda(): BelongsTo
    {
        return $this->belongsTo(Encomienda::class);
    }
}