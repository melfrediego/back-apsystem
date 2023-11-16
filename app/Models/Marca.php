<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'logo', 'seo_url', 'ativo', 'destaque'];

    protected $attributes = [
        'ativo' => 'N', // Valor padrão 'N' (inativo)
        'destaque' => 'N', // Valor padrão 'N' (não destacado)
    ];

    public function produtos(){
        return $this->hasMany(Produto::class);
    }
}
