<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class VendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');

        for ($i = 0; $i < 20; $i++) {
            // Cria um registro de usuário e obtém o ID inserido
            $user_id = DB::table('users')->insertGetId([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('senha'),
                'is_admin' => false, // Defina como true para administradores, se necessário
                'ativo' => true,
                'foto' => 'caminho/para/a/foto.jpg',
            ]);

            // Cria um registro de vendedor associado ao usuário criado
            DB::table('vendedores')->insert([
                'user_id' => $user_id,
                'nome' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'cpf' => $faker->cpf,
                'data_nascimento' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'cep' => $faker->numerify('#####-###'),
                'endereco' => $faker->streetAddress,
                'numero' => $faker->buildingNumber,
                'bairro' => $faker->citySuffix,
                'cidade' => $faker->city,
                'uf' => $faker->stateAbbr,
                'complemento' => $faker->secondaryAddress,
                'celular1' => $faker->cellphoneNumber,
                'celular2' => $faker->cellphoneNumber,
                'ativo' => true,
                'password' => Hash::make('senha'),
                'percentual_comissao' => 0.00,
                'created_at' => now(),
            ]);
        }
    }
}
