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
        Schema::create('tareas', function (Blueprint $table) {
            $table->increments('id')->unique('id_unique');
            $table->string('nombre');
            $table->date('fecha_ejecucion');
            $table->time('hora_ejecucion');
            $table->text('descripcion')->nullable();
            $table->unsignedInteger('estado_id')->index('fk_tareas_tarea_estados1_idx');
            $table->unsignedInteger('tipo_id')->index('fk_tareas_tarea_tipos1_idx');
            $table->unsignedInteger('recordatorio_id')->index('fk_tareas_tarea_tiempo_recordatorios1_idx');
            $table->unsignedInteger('prioridad_id')->index('fk_tareas_tarea_prioridades1_idx');
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
        Schema::dropIfExists('tareas');
    }
};
