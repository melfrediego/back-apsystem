<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'name' => 'Melfre Diego',
                    'email' => 'melfre21@gmail.com',
                    'ativo' => true,
                    'is_admin' => true,
                    'foto' => 'foto.png',
                    'password' => bcrypt('mdrs2112'),
                ],
                [
                    'name' => 'Allysson Carvalho',
                    'email' => 'allyssoncarvalho.of@gmail.com',
                    'ativo' => true,
                    'is_admin' => true,
                    'foto' => 'foto.png',
                    'password' => bcrypt('Senha11061984'),
                ],
                [
                    'name' => 'Ranni Samara',
                    'email' => 'ranni.dev@gmail.com',
                    'ativo' => false,
                    'is_admin' => true,
                    'foto' => 'foto.png',
                    'password' => bcrypt('mdrs2112'),
                ]
            ]
        );
    }
}
