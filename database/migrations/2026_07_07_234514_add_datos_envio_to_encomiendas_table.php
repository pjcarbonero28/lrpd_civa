<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('encomiendas', function (Blueprint $table) {
            $table->date('fecha_envio')->nullable()->after('codigo_seguimiento');

            $table->string('nombre_destinatario', 150)->nullable()->after('descripcion');
            $table->string('dni_destinatario', 15)->nullable()->after('nombre_destinatario');
            $table->string('telefono_destinatario', 20)->nullable()->after('dni_destinatario');

            $table->string('tipo_paquete', 80)->nullable()->after('telefono_destinatario');
        });
    }

    public function down(): void
    {
        Schema::table('encomiendas', function (Blueprint $table) {
            $table->dropColumn([
                'fecha_envio',
                'nombre_destinatario',
                'dni_destinatario',
                'telefono_destinatario',
                'tipo_paquete',
            ]);
        });
    }
};