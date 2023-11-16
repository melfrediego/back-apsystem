<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "vendedores";

    protected $fillable = [
        'user_id',
        'nome',
        'email',
        'cpf',
        'data_nascimento',
        'cep',
        'endereco',
        'numero',
        'bairro',
        'cidade',
        'uf',
        'complemento',
        'celular1',
        'celular2',
        'ativo',
        'password',
        'percentual_comissao'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
