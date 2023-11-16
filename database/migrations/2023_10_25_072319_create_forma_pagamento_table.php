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
        Schema::create('forma_pagamento', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('api_url', 255)->nullable();
            $table->string('chave_01', 255)->nullable();
            $table->string('chave_02', 255)->nullable();
            $table->string('chave_03', 255)->nullable();
            $table->string('chave_04', 255)->nullable();
            $table->string('logo', 255)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forma_pagamento');
    }
};
