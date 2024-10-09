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
        Schema::table('residentes', function (Blueprint $table) {
            $table->foreign(['direccion_id'], 'fk_residentes_direcciones1')->references(['id'])->on('direcciones')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('residentes', function (Blueprint $table) {
            $table->dropForeign('fk_residentes_direcciones1');
        });
    }
};
