<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateUsuario extends Component
{

    use WithFileUploads;
    
    #[Rule('required|min:10|max:100')] 
    public $nome;

    #[Rule('required|email|min:10|max:150')] 
    public $email;
    
    #[Rule('nullable|image|max:1024')] 
    public $foto;

    public $titulo_card_create = 'Usuários';
    public $subtitulo_card_create = 'Utilize o formulário abaixo para criar um novo usuário';

    public $ativo = true;
    public $admin = false;
    public $senha;
    public $confirma_senha;
    public $randImage;
    public $msg_erro = '';
    public $msg_sucesso = '';


    public function store(){

        $this->validate();

        $data = [
            'name' => $this->nome,
            'email' => $this->email,
            'foto' => $this->foto,
            'password' => bcrypt($this->senha),
            'ativo' => $this->ativo,
            'is_admin' => $this->admin,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('uploads/usuarios/foto', 'public');
        }else{
            $data['foto'] = 'logo_deu_errado.png';
        }
        
        $options = ['showCloseButton' => true, 'timer' => 5];

        try {
            User::create($data);

            //enivar email para usuario criar ou redefinir senha

            $this->resetFields();
            $this->dispatch('alert', 'Usuário cadastrada com sucesso!', 'success', $options);
            return;

        } catch (\Exception $e) {
            $this->dispatch('alert', 'Erro ao cadastrar novo usuário!', 'danger', $options);
        }   
    }

    private function checkboxValueSN($value)
    {
        return $value ? 'S' : 'N';
    }

     private function resetFields(){
        $this->reset([
            'nome', 'email', 'ativo', 'admin', 'foto', 'senha',
        ]);

        $this->randImage++;
    }

    public function render()
    {
        return view('livewire.usuarios.create');
    }
}
