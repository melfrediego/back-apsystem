<?php
namespace App\Livewire\Marcas;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Marca;


class IndexComponent extends Component
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

        $query = Marca::query();

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

        $marcas = $query->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc')
                        ->paginate($this->perPage);

        return view('livewire.marcas.index', [
            "marcas" => $marcas,
        ]);
    }

    // public function resetPagina(): void
    // {
    //     $this->resetPage(); // Redefine a página atual para 1 após a alteração.
    //     //$this->goToPage(1);
    // }

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
    
}
