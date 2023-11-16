<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisponibilidadeProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'valor' => 0,
                'descricao' => 'Disponibilidade Imediata',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 1,
                'descricao' => '1 dia útil',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 2,
                'descricao' => '2 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 3,
                'descricao' => '3 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 4,
                'descricao' => '4 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 5,
                'descricao' => '5 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 6,
                'descricao' => '6 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 7,
                'descricao' => '7 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 8,
                'descricao' => '8 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 9,
                'descricao' => '9 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 10,
                'descricao' => '10 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 15,
                'descricao' => '15 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 20,
                'descricao' => '20 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 30,
                'descricao' => '30 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 45,
                'descricao' => '45 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 60,
                'descricao' => '60 dias úteis',
                'created_at' => Carbon::now(),
            ],
            [
                'valor' => 90,
                'descricao' => '90 dias úteis',
                'created_at' => Carbon::now(),
            ],
        ];


        DB::table('disponibilidade_produtos')->insert($data);

    }
}
