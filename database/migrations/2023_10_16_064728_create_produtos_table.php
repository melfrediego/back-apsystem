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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 255);
            $table->text('descricao')->nullable();

            // Midias
            $table->longText('video_url')->nullable();
            
            $table->decimal('preco_custo', 10, 2)->nullable();
            $table->decimal('preco_venda', 10, 2);
            $table->decimal('preco_venda_dolar', 10, 2)->nullable();
            $table->decimal('preco_venda_euro', 10, 2)->nullable();
            $table->decimal('preco_promo', 10, 2)->nullable();
            $table->string('estoque_sku', 40);

            //Alguns serviços de markting pedem esses numero
            $table->string('estoque_gtin', 40)->nullable(); // codigo de barras EAN 13 informado pelo fabricante
            $table->string('estoque_npm', 40)->nullable(); // codigo especifo para pesquisa, do mesmo fabricante
            $table->string('estoque_ncm', 40)->nullable(); // tributação(nomenclatura comum do mercosul 8 digitos) natureza da mercadoria
            $table->enum('gerenciar_estoque', ['S', 'N'])->nullable();
            $table->bigInteger('estoque_quantidade')->nullable();
            
            $table->foreignId('disponibilidade_id')->nullable()->constrained('disponibilidade_produtos', 'id'); // imediata, 1 dia util ... (tranformar em uma tabela)
            $table->foreignId('estoque_acabar_id')->nullable()->constrained('estoque_acabar', 'id'); // tornar indisponivel, mudar disponibilidade para 1 dia util ... (tranformar em uma tabela)
            
            $table->decimal('peso', 10, 2)->nullable(); // Kg 0,000
            $table->integer('altura')->nullable(); // cm 15
            $table->integer('largura')->nullable(); // cm 16
            $table->integer('profundidade')->nullable(); // cm 15

            $table->foreignId('categoria_id')->nullable()->constrained('categorias', 'id');
            $table->foreignId('marca_id')->nullable()->constrained('marcas', 'id');

            $table->text('seo_tag_titulo', 100)->nullable();
            $table->string('seo_meta_tag_descricao', 250)->nullable();
            $table->string('seo_url', 100)->nullable();
            
            $table->enum('preco_sob_consulta', ['S', 'N'])->nullable();

            $table->enum('ativo', ['S', 'N'])->nullable();
            $table->enum('variacao', ['S', 'N'])->nullable();
            $table->enum('destaque', ['S', 'N'])->nullable();
            $table->enum('situacao', ['N', 'U'])->nullable(); // N=novo, U=Usado


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
