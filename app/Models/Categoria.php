<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome', 
        'descricao', 
        'logo',
        'seo_tag_titulo', 
        'seo_meta_tag_descricao', 
        'url', 
        'ativo', 
        'destaque'
    ];

    //Uma categoria TEM MUITOS produtos
    public function produtos(){
        return $this->hasMany(Produto::class);
    }

}
