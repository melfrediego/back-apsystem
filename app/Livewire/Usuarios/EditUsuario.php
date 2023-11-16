<?php

namespace App\Livewire\Usuarios;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditUsuario extends Component
{
    use WithFileUploads;
    
    #[Rule('required|min:10|max:100')] 
    public $nome;

    #[Rule('required|email|min:10|max:150')] 
    public $email;
    
    #[Rule('nullable|image|max:1024')] 
    public $foto;

    public $titulo_card_edit = 'Editando usuário';
    public $subtitulo_card_edit = 'Utilize o formulário abaixo para alterar um usuário';

    public $ativo = true;
    public $admin = false;
    public $senha;
    public $usuario_id;
    public $foto_preview;
    public $confirma_senha;
    public $randImage;
    public $msg_erro = '';
    public $msg_sucesso = '';

    public function mount($id){
        $usuario = User::findOrFail($id);

        $this->usuario_id = $usuario->id;
        $this->nome = $usuario->name;
        $this->email = $usuario->email;
        $this->ativo = $usuario->ativo;
        $this->admin = $usuario->is_admin;
        $this->foto = null;
        $this->foto_preview = $usuario->foto;
    }

    public function update(){

        $this->validate();
        $usuario = User::findOrFail($this->usuario_id);
        $data = [
            'name' => $this->nome,
            'email' => $this->email,
            'foto' => $this->foto ? $this->foto->store('uploads/usuarios/foto', 'public') : $usuario->foto,
            'password' => $this->senha ? bcrypt($this->senha) : $usuario->password,
            'ativo' => $this->ativo,
            'is_admin' => $this->admin,
        ];
        
        $options = ['showCloseButton' => true, 'timer' => 5];

        try {
            $usuario->update($data);

            //enivar email para usuario criar ou redefinir senha
            $this->dispatch('alert', 'Usuário cadastrada com sucesso!', 'success', $options);
            return;

        } catch (\Exception $e) {
            $this->dispatch('alert', 'Erro ao cadastrar novo usuário!'. $e->getMessage(), 'danger', $options);
        }   
    }

    public function render()
    {
        return view('livewire.usuarios.edit');
    }
}
