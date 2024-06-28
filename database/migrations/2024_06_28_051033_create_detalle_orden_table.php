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
        Schema::create('detalle_orden', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ID_Orden')->constrained('orders'); // Clave foránea a la tabla orders
            $table->foreignId('ID_Producto')->constrained('productos'); // Clave foránea a la tabla productos
            $table->integer('cantidad'); // Cantidad
            $table->decimal('precio', 10, 2); // Precio
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_orden');
    }
};
