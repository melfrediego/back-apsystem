<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
   private $produto;

    public function __construct(Produto $produto)
    {
        $this->produto = $produto;
    }

    public function index(Request $request){
        //$produtos = $this->produto->with('imagens')->paginate('10');
        if(!empty($request->search)){
            $produtos = $this->produto->with(['imagens' => function ($q) {
                            $q->where('img_capa' ,true);
                        }])
                        ->orWhere('nome', 'like', '%' . $request->search . '%')
                        ->orWhere('estoque_sku', 'like', '%' . $request->search . '%')
                        ->paginate(10);
        }else{
            $produtos = $this->produto->with(['imagens' => function ($q) {
                            $q->where('img_capa' ,true);
                        }])
                        ->paginate(10);
        }
        
        return response()->json($produtos, 200);
    }
}
