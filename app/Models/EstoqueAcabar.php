<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstoqueAcabar extends Model
{
    use HasFactory;

    protected $table = 'estoque_acabar';

    protected $fillable = [
        'valor',
        'descricao',
    ];

    public function produto(){
        return $this->belongsTo(Produto::class);
    }
}
