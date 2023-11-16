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
        Schema::create('estoque_acabar', function (Blueprint $table) {
            $table->id();
            $table->integer('valor'); // 0 = Imediata, 1 = 1 Dia Util .....
            $table->string('descricao', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque_acabar');
    }
};
