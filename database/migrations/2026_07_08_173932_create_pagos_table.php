<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('pagos')) {
            Schema::create('pagos', function (Blueprint $table) {
                $table->id();

                $table->foreignId('encomienda_id')
                    ->constrained('encomiendas')
                    ->onDelete('cascade');

                $table->decimal('monto', 10, 2);
                $table->string('metodo_pago', 50);
                $table->string('estado_pago', 30)->default('Pagado');
                $table->timestamp('fecha_pago')->nullable();

                $table->timestamps();
            });
        } else {
            Schema::table('pagos', function (Blueprint $table) {
                if (!Schema::hasColumn('pagos', 'encomienda_id')) {
                    $table->foreignId('encomienda_id')
                        ->nullable()
                        ->after('id')
                        ->constrained('encomiendas')
                        ->onDelete('cascade');
                }

                if (!Schema::hasColumn('pagos', 'monto')) {
                    $table->decimal('monto', 10, 2)->nullable()->after('encomienda_id');
                }

                if (!Schema::hasColumn('pagos', 'metodo_pago')) {
                    $table->string('metodo_pago', 50)->nullable()->after('monto');
                }

                if (!Schema::hasColumn('pagos', 'estado_pago')) {
                    $table->string('estado_pago', 30)->default('Pagado')->after('metodo_pago');
                }

                if (!Schema::hasColumn('pagos', 'fecha_pago')) {
                    $table->timestamp('fecha_pago')->nullable()->after('estado_pago');
                }

                if (!Schema::hasColumn('pagos', 'created_at')) {
                    $table->timestamp('created_at')->nullable();
                }

                if (!Schema::hasColumn('pagos', 'updated_at')) {
                    $table->timestamp('updated_at')->nullable();
                }
            });
        }
    }

    public function down(): void
    {
        Schema::table('pagos', function (Blueprint $table) {
            if (Schema::hasColumn('pagos', 'fecha_pago')) {
                $table->dropColumn('fecha_pago');
            }

            if (Schema::hasColumn('pagos', 'estado_pago')) {
                $table->dropColumn('estado_pago');
            }

            if (Schema::hasColumn('pagos', 'metodo_pago')) {
                $table->dropColumn('metodo_pago');
            }

            if (Schema::hasColumn('pagos', 'monto')) {
                $table->dropColumn('monto');
            }
        });
    }
};