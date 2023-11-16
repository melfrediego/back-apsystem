<?php

namespace App\Livewire\Clientes;

use Livewire\Component;
use Livewire\WithPagination;

class IndexCliente extends Component
{
    use WithPagination;

    public $titulo_card_index = 'Clientes';
    public $subtitulo_card_index = 'Listagem de clientes';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function render()
    {
        $clientes = [1,2,3,4,5,6,7,8,9,10];
        return view('livewire.clientes.index', [
            "clientes" => $clientes
        ]);
    }
}
