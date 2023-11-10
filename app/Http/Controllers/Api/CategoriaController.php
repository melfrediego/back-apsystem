<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    private $categoria;

    public function __construct(Categoria $categoria)
    {
        $this->categoria = $categoria;
    }

    public function index(){
        $categorias = $this->categoria->where('ativo', '=', 'S')->get(['id','nome', 'descricao']);

        return response()->json($categorias, 200);
    }
}
