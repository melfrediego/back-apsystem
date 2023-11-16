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
        Schema::create('vendedores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users', 'id')->cascadeOnDelete(); // Pode ser um vendedor sem acesso ao sistema!?
            $table->string('nome', 130);
            $table->string('email', 150)->unique();
            $table->string('cpf')->nullable();
            $table->string('data_nascimento', 10)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('endereco', 180)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('bairro', 100)->nullable();
            $table->string('cidade', 80)->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('complemento')->nullable();
            $table->string('celular1');
            $table->string('celular2')->nullable();
            $table->boolean('ativo')->nullable();
            $table->string('password')->nullable();
            $table->decimal('percentual_comissao', 10,2)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vendedores');
    }
};
