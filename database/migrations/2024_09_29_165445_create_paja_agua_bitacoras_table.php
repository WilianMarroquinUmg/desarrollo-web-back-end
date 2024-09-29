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
        Schema::create('paja_agua_bitacoras', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_registro');
            $table->unsignedInteger('residente_id')->index('fk_registros_propietarios_pajas_aguas_residentes2_idx');
            $table->unsignedInteger('paja_agua_id')->index('fk_registros_propietarios_pajas_aguas_pajas_aguas1_idx');
            $table->unsignedInteger('transaccion_id')->index('fk_registros_propietarios_pajas_aguas_tipo_adquisicion1_idx');
            $table->unsignedInteger('direccion_id')->index('fk_registros_propietarios_pajas_aguas_direcciones1_idx');
            $table->unsignedBigInteger('user_transacciona_id')->index('fk_paja_agua_bitacoras_users1_idx');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paja_agua_bitacoras');
    }
};
