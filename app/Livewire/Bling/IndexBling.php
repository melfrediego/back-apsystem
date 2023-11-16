<?php

namespace App\Livewire\Bling;

use Livewire\Component;
use Livewire\WithPagination;

class IndexBling extends Component
{
    use WithPagination;

    public $titulo_card_index = 'Bling';
    public $subtitulo_card_index = 'Faturamento externos';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function render()
    {
        $faturamentos = [1,2,3,4,5,6,7,8,9,10];
        return view('livewire.bling.index', [
            "faturamentos" => $faturamentos
        ]);
    }
}
