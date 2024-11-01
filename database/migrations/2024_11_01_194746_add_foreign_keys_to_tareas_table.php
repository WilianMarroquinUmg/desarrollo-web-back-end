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
        Schema::table('tareas', function (Blueprint $table) {
            $table->foreign(['estado_id'], 'fk_tareas_tarea_estados1')->references(['id'])->on('tarea_estados')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['prioridad_id'], 'fk_tareas_tarea_prioridades1')->references(['id'])->on('tarea_prioridades')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['recordatorio_id'], 'fk_tareas_tarea_tiempo_recordatorios1')->references(['id'])->on('tarea_tiempo_recordatorios')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['tipo_id'], 'fk_tareas_tarea_tipos1')->references(['id'])->on('tarea_tipos')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['user_id'], 'fk_tareas_users1')->references(['id'])->on('users')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tareas', function (Blueprint $table) {
            $table->dropForeign('fk_tareas_tarea_estados1');
            $table->dropForeign('fk_tareas_tarea_prioridades1');
            $table->dropForeign('fk_tareas_tarea_tiempo_recordatorios1');
            $table->dropForeign('fk_tareas_tarea_tipos1');
            $table->dropForeign('fk_tareas_users1');
        });
    }
};
