<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Encomienda extends Model
{
    use HasFactory;

    protected $table = 'encomiendas';

    protected $fillable = [
        'cliente_id',
        'codigo_seguimiento',
        'fecha_envio',
        'origen',
        'destino',
        'peso',
        'descripcion',
        'estado',
        'nombre_destinatario',
        'dni_destinatario',
        'telefono_destinatario',
        'tipo_paquete',
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    public function seguimientos()
    {
        return $this->hasMany(Seguimiento::class, 'encomienda_id');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'encomienda_id');
    }

    public function pago()
{
    return $this->hasOne(Pago::class, 'encomienda_id');
}
}