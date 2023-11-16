<?php

namespace App\Livewire\ContasPagar;

use Livewire\Component;
use Livewire\WithPagination;

class IndexContaPagar extends Component
{

    use WithPagination;

    public $titulo_card_index = 'Contas a pagar';
    public $subtitulo_card_index = 'Listagem de financeira de contas a pagar';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function render()
    {
        $contas_pagar = [1,2,3,4,5,6,7,8,9,10];

        return view('livewire.contas-pagar.index', [
            'contas_pagar' => $contas_pagar
        ]);
    }
}
