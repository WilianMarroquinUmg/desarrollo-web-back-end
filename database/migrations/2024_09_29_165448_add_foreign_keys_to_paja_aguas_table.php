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
        Schema::table('paja_aguas', function (Blueprint $table) {
            $table->foreign(['residente_id'], 'fk_pajas_aguas_residentes1')->references(['id'])->on('residentes')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('paja_aguas', function (Blueprint $table) {
            $table->dropForeign('fk_pajas_aguas_residentes1');
        });
    }
};
