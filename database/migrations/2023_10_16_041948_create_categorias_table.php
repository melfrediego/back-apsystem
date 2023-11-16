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
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100)->unique();
            $table->text('descricao', 450)->nullable();
            $table->string('logo', 255)->nullable();
            $table->string('seo_tag_titulo', 100)->nullable();
            $table->string('seo_meta_tag_descricao', 250)->nullable();
            $table->string('url', 150)->nullable();
            $table->enum('ativo', ['S', 'N'])->nullable();
            $table->enum('destaque', ['S', 'N'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
