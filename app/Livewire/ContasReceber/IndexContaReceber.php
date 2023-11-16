<?php

namespace App\Livewire\ContasReceber;

use Livewire\Component;
use Livewire\WithPagination;

class IndexContaReceber extends Component
{

    use WithPagination;

    public $titulo_card_index = 'Contas a receber';
    public $subtitulo_card_index = 'Listagem de financeira de contas a receber';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function render()
    {
        $contas_receber = [1,2,3,4,5,6,7,8,9,10];
        return view('livewire.contas-receber.index', [
            "contas_receber" => $contas_receber
        ]);
    }
}
