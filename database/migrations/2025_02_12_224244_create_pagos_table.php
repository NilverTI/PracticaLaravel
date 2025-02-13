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
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('monto', 10, 2);
            $table->unsignedBigInteger('reserva_id');
            $table->enum('metodo_pago',['targeta_credito','paypal','transferencia_bancaria']);
            $table->enum('estado', ['pendiente', 'pagado'])->default('pendiente');
            $table->timestamps();
            $table->foreign('reserva_id')->references('id')->on('reservas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
