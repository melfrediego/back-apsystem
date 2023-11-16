<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisponibilidadeProduto extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor',
        'descricao',
    ];

    //Uma categoria TEM MUITOS produtos
    // public function produtos(){
    //     return $this->hasMany(Produto::class);
    // }
}
