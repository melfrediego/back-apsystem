<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'video_url',
        'preco_custo',
        'preco_venda',
        'preco_venda_dolar',
        'preco_venda_euro',
        'preco_promo',
        'estoque_sku',
        'estoque_gtin',
        'estoque_npm',
        'estoque_ncm',
        'gerenciar_estoque',
        'estoque_quantidade',
        'disponibilidade_id',
        'estoque_acabar_id',
        'peso',
        'altura',
        'largura',
        'profundidade',
        'categoria_id',
        'marca_id',
        'seo_tag_titulo',
        'seo_meta_tag_descricao',
        'seo_url',
        'preco_sob_consulta',
        'ativo',
        'variacao',
        'destaque',
        'situacao',
    ];

    public function estoque_acabar(){
        return $this->belongsTo(EstoqueAcabar::class);
    }

    public function disponibilidade(){
        return $this->belongsTo(DisponibilidadeProduto::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    public function marca(){
        return $this->belongsTo(Marca::class);
    }

    public function imagens(){
        return $this->hasMany(ImagemProduto::class);
    }

}
