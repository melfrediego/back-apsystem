<?php

namespace App\Livewire\Categorias;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Categoria;
use App\Livewire\Utils\Alert;

class EditCategoria extends Component
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


    public function mount($id){
        $categoria = Categoria::findOrFail($id);
        $this->categoria_id = $categoria->id;
        $this->nome = $categoria->nome;
        $this->descricao = $categoria->descricao;
        $this->ativo = $this->checkboxValueTrueFalse($categoria->ativo);
        $this->destaque = $this->checkboxValueTrueFalse($categoria->destaque);
        $this->logo = null;
        $this->logoPreview = $categoria->logo;
        $this->seo_url = $categoria->url;
        $this->seo_tag_titulo = $categoria->seo_tag_titulo;
        $this->seo_meta_tag_descricao = $categoria->seo_meta_tag_descricao;
    }
    
    public function update(){

        $this->validate();

        if ($this->logo) {
            $data['logo'] = $this->logo->store('uploads/categorias/logos', 'public');
        }else{
            $data['logo'] = 'logo_deu_errado.png';
        }

        $options = ['showCloseButton' => false, 'timer' => 5];

        try {
            $categoria = Categoria::findOrFail($this->categoria_id);
            
            $data = [
                'nome' => $this->nome,
                'descricao' => $this->descricao,
                'seo_tag_titulo' => $this->seo_tag_titulo,
                'seo_meta_tag_descricao' => $this->seo_meta_tag_descricao,
                'url' => $this->seo_url,
                'ativo' => $this->checkboxValueSN($this->ativo),
                'destaque' => $this->checkboxValueSN($this->destaque),
                'logo' => $this->logo ? $this->logo->store('uploads/marcas/logos', 'public') : $categoria->logo,
            ];

            $categoria->update($data);

            $this->dispatch('alert', 'Categoria atualiza com sucesso!', 'success', $options);
            return;

        } catch (\Exception $e) {
            $this->dispatch('alert', 'Erro ao atualizar categoria!', 'danger', $options);
            return;
        }   
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

    private function checkboxValueSN($value)
    {
        return $value ? 'S' : 'N';
    }

    private function checkboxValueTrueFalse($value)
    {
        return $value === 'S' ? true : false;
    }

    public function render()
    {
        return view('livewire.categorias.edit');
    }
}
