<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pago extends Model
{
    protected $fillable = [
        'encomienda_id',
        'monto',
        'metodo_pago',
        'fecha_pago'
    ];

    public function encomienda(): BelongsTo
    {
        return $this->belongsTo(Encomienda::class);
    }
}