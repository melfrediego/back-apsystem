<?php

namespace App\Livewire\Marcas;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Marca;
use App\Livewire\Utils\Alert;

class CreateComponent extends Component
{
    use WithFileUploads;
    
    #[Rule('required|min:10|max:100')] 
    public $nome;
    
    #[Rule('nullable|image|max:1024')] 
    public $logo;

    public $titulo_card_create = 'Marcas';
    public $subtitulo_card_create = 'Utilize o formulário abaixo para criar uma nova marca';

    public $ativo = true;
    public $randImage;
    public $marcas, $marca_id, $descricao, $destaque, $logoPreview, $seo_url;
    public $msg_erro = '';
    public $msg_sucesso = '';
    
    public function store(){

        $this->validate();

        $data = [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'seo_url' => $this->seo_url,
            'ativo' => $this->checkboxValueSN($this->ativo),
            'destaque' => $this->checkboxValueSN($this->destaque),
        ];

        if ($this->logo) {
            $data['logo'] = $this->logo->store('uploads/marcas/logos', 'public');
        }else{
            $data['logo'] = 'logo_deu_errado.png';
        }
        
        $options = ['showCloseButton' => false, 'timer' => 5];

        try {
            Marca::create($data);
            $this->resetFields();
            $this->dispatch('alert', 'Marca cadastrada com sucesso!', 'success', $options);
            return;

        } catch (\Exception $e) {
            $this->dispatch('alert', 'Erro ao cadastrar nova marca!', 'danger', $options);
        }   
    }

    private function checkboxValueSN($value)
    {
        return $value ? 'S' : 'N';
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
        return view('livewire.marcas.create');
    }

}
