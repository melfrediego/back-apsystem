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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vendedor_id')->constrained('vendedores', 'id');
            $table->foreignId('cliente_id')->nullable()->constrained('clientes', 'id');
            $table->foreignId('forma_pagamento_id')->nullable()->constrained('forma_pagamento', 'id');
            $table->foreignId('forma_envio_id')->nullable()->constrained('forma_envio', 'id');
            $table->foreignId('situacao_pedido_id')->nullable()->constrained('situacao_pedido', 'id');
            $table->decimal('valor_total',10,2);
            $table->text('link_pagamento')->nullable();
            $table->text('link_nfce')->nullable();
            $table->text('observacao')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
