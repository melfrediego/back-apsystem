<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstoqueAcabarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'valor' => 0,
                'descricao' => 'tornar o produto indisponível',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 00,
                'descricao' => 'Continuar vendando normalmente',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 1,
                'descricao' => 'Mudar disponibilidae para 1 dia útil',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 2,
                'descricao' => 'Mudar disponibilidae para 2 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 3,
                'descricao' => 'Mudar disponibilidae para 3 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 4,
                'descricao' => 'Mudar disponibilidae para 4 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 5,
                'descricao' => 'Mudar disponibilidae para 5 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 6,
                'descricao' => 'Mudar disponibilidae para 6 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 7,
                'descricao' => 'Mudar disponibilidae para 7 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 8,
                'descricao' => 'Mudar disponibilidae para 8 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 9,
                'descricao' => 'Mudar disponibilidae para 9 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 10,
                'descricao' => 'Mudar disponibilidae para 10 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 15,
                'descricao' => 'Mudar disponibilidae para 15 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 20,
                'descricao' => 'Mudar disponibilidae para 20 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 30,
                'descricao' => 'Mudar disponibilidae para 30 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 45,
                'descricao' => 'Mudar disponibilidae para 45 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 60,
                'descricao' => 'Mudar disponibilidae para 60 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 90,
                'descricao' => 'Mudar disponibilidae para 90 dias úteis',
                'created_at' => Carbon::now(),
            ],
        ];

        DB::table('estoque_acabar')->insert($data);
    }
}
