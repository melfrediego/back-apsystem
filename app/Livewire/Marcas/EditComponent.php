<?php

namespace App\Livewire\Marcas;

use App\Models\Marca;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class EditComponent extends Component
{
    use WithFileUploads;
    
    #[Rule('required|min:10|max:100')] 
    public $nome;
    
    #[Rule('nullable|image|max:1024')] 
    public $logo;

    public $ativo = true;
    public $randImage;
    public $marcas, $marca_id, $descricao, $destaque, $logoPreview, $seo_url;
    public $msg_erro = '';
    public $msg_sucesso = '';

    public function mount($id){
        $marca = Marca::findOrFail($id);

        $this->marca_id = $marca->id;
        $this->nome = $marca->nome;
        $this->descricao = $marca->descricao;
        $this->ativo = $this->checkboxValueTrueFalse($marca->ativo);
        $this->destaque = $this->checkboxValueTrueFalse($marca->destaque);
        $this->logo = null;
        $this->logoPreview = $marca->logo;
        $this->seo_url = $marca->seo_url;
    }

    public function update()
    {
        
        $this->validate();

        $options = ['showCloseButton' => true, 'timer' => 5];
        try {
            $marca = Marca::findOrFail($this->marca_id);
            
            $marca->update([
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'ativo' => $this->checkboxValueSN($this->ativo),
            'destaque' => $this->checkboxValueSN($this->destaque),
            'logo' => $this->logo ? $this->logo->store('uploads/marcas/logos', 'public') : $marca->logo,
            'seo_url' => $this->seo_url,
            ]);

            // $this->resetFields();
            
            $this->dispatch('alert', 'Marca atualizada com sucesso!', 'success', $options);
            return;

        } catch (\Exception $e) {
            $this->dispatch('alert', 'Erro ao atualizar marca!' . $e->getMessage(), 'danger', $options);
        }   
    }

    private function checkboxValueSN($value)
    {
        return $value ? 'S' : 'N';
    }

    private function checkboxValueTrueFalse($value)
    {
        return $value === 'S' ? true : false;
    }

     private function resetFields()
     {
        $this->reset([
            'marca_id', 'nome', 'descricao', 'ativo', 'destaque', 'logo', 'seo_url',
        ]);

        $this->randImage++;
    }

    public function render()
    {
        return view('livewire.marcas.edit');
    }
}
