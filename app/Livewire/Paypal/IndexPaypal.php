<?php

namespace App\Livewire\Paypal;

use Livewire\Component;
use Livewire\WithPagination;

class IndexPaypal extends Component
{
    use WithPagination;

    public $titulo_card_index = 'Paypal';
    public $subtitulo_card_index = 'Pedidos internacionais realizados plataforma paypal';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function render()
    {
        $paypal_pedidos = [1,2,3,4,5,6,7,8,9,10];
        return view('livewire.paypal.index', [
            "paypal_pedidos" => $paypal_pedidos
        ]);
    }
}
