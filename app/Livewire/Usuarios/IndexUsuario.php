<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUsuario extends Component
{
     use WithPagination;

    public $titulo_card_index = 'Usuários';
    public $subtitulo_card_index = 'Listagem de usuarios';

    public $sortField = 'created_at';
    public $sortAsc = true;
    public $perPage = 10;
    public $ativoFiltro = null;
    public $destaqueFiltro = null;
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

    public function orderByDestaque()
    {
        $this->sortBy('destaque');
        $this->resetPage();
        // $this->goToPage(1);
    }

    public function render()
    {   

        $query = User::query();

        // Aplicar filtros
        if ($this->ativoFiltro !== null) {
            $query->where('ativo', $this->ativoFiltro);
        }

        // Aplicar pesquisa por nome ou descrição
        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        $usuarios = $query->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                        ->paginate($this->perPage);

        return view('livewire.usuarios.index', [
            "usuarios" => $usuarios
        ]);
    }
}
