<?php

namespace Database\Seeders;

use App\Models\SituacaoPedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SituacaoPedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        SituacaoPedido::create([
            "nome" => "Cancelado",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Pedido efetuado",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Entregue",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Enviado",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Pago",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Em produção",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Em separação",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Pronto pra retirada",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Aguardando pgto",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Pgto devolvido",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Pgto em análise",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Pgto em chargeback",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
        SituacaoPedido::create([
            "nome" => "Pgto em disputa ",
            "cor" => "#6eaa5e",
            "ativo" => true
        ]);
    }
}
