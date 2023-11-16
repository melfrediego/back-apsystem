<?php

namespace App\Livewire\Pagarme;

use Livewire\Component;
use Livewire\WithPagination;

class IndexPagarme extends Component
{
    use WithPagination;

    public $titulo_card_index = 'Pagar.Me';
    public $subtitulo_card_index = 'Pedidos realizados plataforma pagar.me';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function render()
    {
         $pagarme_pedidos = [1,2,3,4,5,6,7,8,9,10];
        return view('livewire.pagarme.index', [
            "pagarme_pedidos" => $pagarme_pedidos
        ]);
    }
}
