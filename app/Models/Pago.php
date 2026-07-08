<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    protected $fillable = [
        'encomienda_id',
        'monto',
        'metodo_pago',
        'estado_pago',
        'fecha_pago',
    ];

    public function encomienda()
    {
        return $this->belongsTo(Encomienda::class, 'encomienda_id');
    }
}