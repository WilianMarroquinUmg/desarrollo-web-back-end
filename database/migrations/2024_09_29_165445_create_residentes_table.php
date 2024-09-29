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
        Schema::create('residentes', function (Blueprint $table) {
            $table->increments('id')->unique('id_unique');
            $table->string('primer_nombre', 100);
            $table->string('segundo_nombre', 100)->nullable();
            $table->string('tercer_nombre', 100)->nullable();
            $table->string('primer_apellido', 100)->nullable();
            $table->string('segundo_apellido', 100)->nullable();
            $table->string('apellido_casada', 100)->nullable();
            $table->string('dpi', 14);
            $table->date('fecha_nacimiento')->nullable();
            $table->unsignedInteger('direccion_id')->index('fk_residentes_direcciones1_idx');
            $table->enum('sexo', ['M', 'F'])->nullable();
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
        Schema::dropIfExists('residentes');
    }
};
