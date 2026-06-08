<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('numero_pedido', 50)->unique();
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('restrict');
            $table->decimal('precio_total', 10, 2);

            $table->string('codigo_postal', 10)->nullable();
            $table->string('provincia', 100);
            $table->string('poblacion', 100);
            $table->string('calle', 255);
            $table->string('numero', 20)->nullable();
            $table->string('planta', 20)->nullable();
            $table->string('puerta', 20)->nullable();
            $table->text('detalles')->nullable();

            $table->dateTime('fecha_pedido')->useCurrent();

            $table->index('usuario_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
