<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_compra', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('pago_total_com');
            $table->integer('cantidad_car');
            $table->integer('id_carrito');
            $table->integer('id_usuario');
            $table->integer('id_producto');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_compra');
    }
};
