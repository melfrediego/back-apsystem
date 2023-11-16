<?php

namespace App\Livewire\Vendedores;

use App\Models\Vendedor;
use Livewire\Component;
use Livewire\WithPagination;

class IndexVendedor extends Component
{
    use WithPagination;

    public $titulo_card_index = 'Vendedores';
    public $subtitulo_card_index = 'Listagem de vendedores';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortField = $field;
            $this->sortAsc = true;
        }
    }

    public function orderByAtivo()
    {
        $this->sortBy('ativo');
        $this->resetPage();
    }

    public function render()
    {

        $query = Vendedor::with('user');

        // dd($query);

        //Aplicar filtros
        if ($this->ativoFiltro !== null) {
            $query->where('ativo', $this->ativoFiltro);
        }

        // Aplicar pesquisa por nome ou descrição
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nome', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

       $vendedores = $query->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                            ->paginate($this->perPage);

       //dd($vendedores);
                        

        return view('livewire.vededores.index', [
            "vendedores" => $vendedores
        ]);
    }
}
