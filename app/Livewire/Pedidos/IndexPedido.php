<?php

namespace App\Livewire\Pedidos;

use Livewire\Component;
use Livewire\WithPagination;

class IndexPedido extends Component
{
    use WithPagination;

    public $titulo_card_index = 'Pedidos';
    public $subtitulo_card_index = 'Listagem de pedidos';

    public $sortField = 'produtos.created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    // public function sortBy($field){
    //     if ($this->sortField === $field) {
    //         $this->sortAsc = !$this->sortAsc;
    //     } else {
    //         $this->sortField = $field;
    //         $this->sortAsc = true;
    //     }
    // }

    // public function orderByAtivo(){
    //     $this->sortBy('produtos.ativo');
    //     $this->resetPage();
    // }

    // public function orderByDestaque(){
    //     $this->sortBy('produtos.destaque');
    //     $this->resetPage();
    // }

    public function render()
    {

        $pedidos = [1,2,3,4,5,6,7,8,9,10,11,12,13];

        return view('livewire.pedidos.index', [
            "pedidos" => $pedidos,
        ]);
    }
}
