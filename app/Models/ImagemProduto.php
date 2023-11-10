<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagemProduto extends Model
{

    protected $table = 'imagens_produto';

    use HasFactory;

     public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
