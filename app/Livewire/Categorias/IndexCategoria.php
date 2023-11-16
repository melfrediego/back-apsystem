<?php

namespace App\Livewire\Categorias;
use Livewire\WithPagination;
use App\Models\Categoria;
use Livewire\Component;


class IndexCategoria extends Component
{
     use WithPagination;
    
    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
    public $search = '';
    public $btnDelete = true;

    public function render()
    {   

        $query = Categoria::query();

        // Aplicar filtros
        if ($this->ativoFiltro !== null) {
            $query->where('ativo', $this->ativoFiltro);
        }
        if ($this->destaqueFiltro !== null) {
            $query->where('destaque', $this->destaqueFiltro);
        }

        // Aplicar pesquisa por nome ou descrição
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nome', 'like', '%' . $this->search . '%')
                    ->orWhere('descricao', 'like', '%' . $this->search . '%');
            });
        }

        $categorias = $query->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                        ->paginate($this->perPage);

        return view('livewire.categorias.index', [
            "categorias" => $categorias,
        ]);
    }

    public function resetPage(){
        // $this->reset();
    }

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

    public function orderByDestaque()
    {
        $this->sortBy('destaque');
        $this->resetPage();
    }
}
