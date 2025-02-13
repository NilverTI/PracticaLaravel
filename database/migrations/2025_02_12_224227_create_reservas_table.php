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
        Schema::create('reservas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_entrada');
            $table->date('fecha_salida');
            $table->enum('estado', ['pendiente', 'confirmada', 'cancelada'])->default('pendiente');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('habitacion_id');
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('habitacion_id')->references('id')->on('habitaciones')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
