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
        Schema::create('paja_aguas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('correlativo', 45);
            $table->unsignedInteger('residente_id')->index('fk_pajas_aguas_residentes1_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paja_aguas');
    }
};