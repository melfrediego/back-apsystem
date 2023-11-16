<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Marca;
use Illuminate\Support\Facades\DB;

class MarcasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Marca::create([
                'nome' => 'Ana Paula Carvvalho',
                'descricao' => 'Ana Paula Carvvalho',
                'logo' => 'https://cdn.awsli.com.br/400x300/1358/1358683/logo/logo-ana-paula-carvalho-rycpsq.jpg',
                'seo_url' => 'https://anapaulacarvalho.com',
                'ativo' => 'S',
                'destaque' => 'S',
            ]
        );

        Marca::create([
                'nome' => 'Ana Authentic',
                'descricao' => 'Ana Authentic',
                'logo' => 'https://cdn.awsli.com.br/400x300/1358/1358683/logo/logo-ana-paula-carvalho-rycpsq.jpg',
                'seo_url' => 'https://lojaana.com',
                'ativo' => 'S',
                'destaque' => 'S',
            ]
        );

        // if ($addMarca){
            // Marca::factory()->count()->create();
        // }
    }
}
