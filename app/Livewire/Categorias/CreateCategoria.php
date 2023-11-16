<?php

namespace App\Livewire\Categorias;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Categoria;
use App\Livewire\Utils\Alert;

class CreateCategoria extends Component
{
    use WithFileUploads;
    
    #[Rule('required|min:10|max:100')] 
    public $nome;
    
    #[Rule('nullable|image|max:1024')] 
    public $logo;

    public $ativo = true;
    public $randImage;
    public $categorias, $categoria_id, $descricao, $destaque, $logoPreview, $seo_url, $seo_tag_titulo, $seo_meta_tag_descricao;
    public $cardTitulo = 'Criar categoria';
    public $cardSubtituloTitulo = 'Utilize o formulário abaixo para criar uma nova categoria';

    
    public function store(){

        $this->validate();

        $data = [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'seo_tag_titulo' => $this->seo_tag_titulo,
            'seo_meta_tag_descricao' => $this->seo_meta_tag_descricao,
            'url' => $this->seo_url,
            'ativo' => $this->checkboxValueSN($this->ativo),
            'destaque' => $this->checkboxValueSN($this->destaque),
        ];

        if ($this->logo) {
            $data['logo'] = $this->logo->store('uploads/categorias/logos', 'public');
        }else{
            $data['logo'] = 'logo_deu_errado.png';
        }


        $options = ['showCloseButton' => false, 'timer' => 5];
        try {
            Categoria::create($data);
            $this->resetFields();
            $this->dispatch('alert', 'Categoria cadastrada com sucesso!', 'success', $options);
            return;

        } catch (\Exception $e) {
            $this->dispatch('alert', 'Erro ao cadastrar nova categoria!', 'danger', $options);
            return;
        }   
    }

    private function checkboxValueSN($value)
    {
        return $value ? 'S' : 'N';
    }

     private function resetFields()
    {
        $this->reset([
            'categoria_id', 
            'nome', 
            'descricao', 
            'ativo', 
            'destaque', 
            'logo', 
            'seo_url',
            'seo_tag_titulo',
            'seo_meta_tag_descricao'
        ]);

        $this->randImage++;
    }

    public function render()
    {
        return view('livewire.categorias.create');
    }
}
