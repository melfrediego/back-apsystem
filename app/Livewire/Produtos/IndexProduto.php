<?php

namespace App\Livewire\Produtos;

use App\Models\Produto;
use Livewire\Component;
use Livewire\WithPagination;

class IndexProduto extends Component
{   

    use WithPagination;

    public $sortField = 'produtos.created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    

    public function resetPage(){
        //$this->resetPage($this->ativoFiltro);
    }

    public function sortBy($field){
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortField = $field;
            $this->sortAsc = true;
        }
    }

    public function orderByAtivo(){
        $this->sortBy('produtos.ativo');
        $this->resetPage();
    }

    public function orderByDestaque(){
        $this->sortBy('produtos.destaque');
        $this->resetPage();
    }

    public function render()
    {
        $query = Produto::with(['categoria', 'disponibilidade', 'estoque_acabar', 'imagens']);

        // Aplicar filtros
        if ($this->ativoFiltro !== null) {
            $query->where('produtos.ativo', $this->ativoFiltro);
        }
        if ($this->destaqueFiltro !== null) {
            $query->where('produtos.destaque', $this->destaqueFiltro);
        }

        // Aplicar pesquisa por nome ou descrição
        if (!empty($this->search)) {

            $query->with(['imagens' => function ($query) {
                $query->where('img_capa', true);
            }])
                // $q->where('imagens.img_capa', true)
                ->orWhere('produtos.nome', 'like', '%' . $this->search . '%')
                ->orWhere('produtos.estoque_sku', 'like', '%' . $this->search . '%');

                $produtos = $query->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                            ->paginate($this->perPage);
            
        }else{
            $produtos = Produto::with(['categoria', 'disponibilidade', 'estoque_acabar', 'imagens' => function ($query) {
                $query->where('img_capa', true);
            }])
            ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
            ->paginate($this->perPage);
        }
        

        // $produtos = Produto::with(['imagens' => function ($query) {
        //         $query->where('img_capa', true);
        //     }])
        //     ->join('categorias', 'produtos.categoria_id', '=', 'categorias.id')
            // ->where(function ($query) use ($nomeProduto, $skuProduto, $disponibilidadeId, $estoqueAcabarId) {
            //     if (!empty($nomeProduto)) {
            //         $query->where('produtos.nome_produto', 'like', '%' . $nomeProduto . '%');
            //     }
            //     if (!empty($skuProduto)) {
            //         $query->where('produtos.sku_produto', 'like', '%' . $skuProduto . '%');
            //     }
            //     if (!empty($disponibilidadeId)) {
            //         $query->where('produtos.disponibilidade_id', $disponibilidadeId);
            //     }
            //     if (!empty($estoqueAcabarId)) {
            //         $query->where('produtos.estoque_acabar_id', $estoqueAcabarId);
            //     }
            // })
            // ->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
            // ->paginate($this->perPage);




        return view('livewire.produtos.index', [
            "produtos" => $produtos,
        ]);
    }
}
