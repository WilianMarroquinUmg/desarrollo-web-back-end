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
        Schema::create('paja_agua_bitacora_tipo_transacciones', function (Blueprint $table) {
            $table->increments('id')->unique('id_unique');
            $table->string('nombre', 100);
            $table->timestamps();
            $table->softDeletes();

            $table->primary(['id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paja_agua_bitacora_tipo_transacciones');
    }
};
