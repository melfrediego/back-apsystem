<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert(
            [
                [
                'nome' => 'Finalizadores', 
                'descricao' => 'Finalizadores', 
                'logo' => 'https://cdn.awsli.com.br/400x300/1358/1358683/logo/logo-ana-paula-carvalho-rycpsq.jpg',
                'seo_tag_titulo' => 'finalizadores', 
                'seo_meta_tag_descricao' => 'finalizadores', 
                'url' => 'https://anapualacarvalho.com/finalizadores', 
                'ativo' => 'S', 
                'destaque' => 'N',
                ],
                [
                'nome' => 'Tratamento', 
                'descricao' => 'Tratamento', 
                'logo' => 'https://cdn.awsli.com.br/400x300/1358/1358683/logo/logo-ana-paula-carvalho-rycpsq.jpg',
                'seo_tag_titulo' => 'tratamento', 
                'seo_meta_tag_descricao' => 'tratamento', 
                'url' => 'https://anapualacarvalho.com/tratamento', 
                'ativo' => 'S', 
                'destaque' => 'N',
                ],
                [
                'nome' => 'Transformação', 
                'descricao' => 'Transformação', 
                'logo' => 'https://cdn.awsli.com.br/400x300/1358/1358683/logo/logo-ana-paula-carvalho-rycpsq.jpg',
                'seo_tag_titulo' => 'transfamação', 
                'seo_meta_tag_descricao' => 'transfamação', 
                'url' => 'https://anapualacarvalho.com/transfamacao', 
                'ativo' => 'S', 
                'destaque' => 'N',
                ]
           ]
        );
    }
}
