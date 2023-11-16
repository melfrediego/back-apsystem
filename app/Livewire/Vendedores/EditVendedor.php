<?php

namespace App\Livewire\Vendedores;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditVendedor extends Component
{

    use WithFileUploads;

    public $titulo_card_edit = 'Editando vendedor';
    public $subtitulo_card_edit = 'Utilize o formulário abaixo para alterar um vendedor';

    #[Rule('required|min:10|max:100')] 
    public $nome;

    #[Rule('required|email|min:10|max:150')] 
    public $email;

    #[Rule('required')] 
    public $celular1 = '';
    
    #[Rule('nullable|image|max:1024')] 
    public $foto;

    public $vendedor_id;
    public $user_id;
    public $cpf = '';
    public $data_nascimento = '';
    public $cep = '';
    public $endereco;
    public $numero;
    public $bairro;
    public $cidade;
    public $uf;
    public $complemento;
    public $celular2 = '';
    public $ativo = true;
    public $percentual_comissao;
    public $senha;
    public $confirma_senha;
    public $foto_preview;

    public $randImage;
    public $msg_erro = '';
    public $msg_sucesso = '';


    public function mount($id){
        $vendedor = Vendedor::with('user')->findOrFail($id);
        
        $this->vendedor_id = $vendedor->id;
        $this->user_id = $vendedor->user->id;
        $this->nome = $vendedor->nome;
        $this->email = $vendedor->email;
        $this->cpf = $vendedor->cpf;
        $this->data_nascimento = $vendedor->data_nascimento;
        $this->cep = $vendedor->cep;
        $this->endereco = $vendedor->endereco;
        $this->numero = $vendedor->numero;
        $this->bairro = $vendedor->bairro;
        $this->cidade = $vendedor->cidade;
        $this->uf = $vendedor->uf;
        $this->complemento = $vendedor->complemento;
        $this->celular1 = $vendedor->celular1;
        $this->celular2 = $vendedor->celular2;
        $this->ativo = $vendedor->ativo;
        $this->percentual_comissao = $vendedor->percentual_comissao;
        $this->foto_preview = $vendedor->user->foto;

        // $this->celular2 = "86 999990909";
        
    }

    public function update(){
        $this->validate();

        $vendedor = Vendedor::with('user')->findOrFail($this->vendedor_id);

        $options = ['showCloseButton' => true, 'timer' => 5];

        try {
            
            DB::beginTransaction();

            $user = $vendedor->user->update([
                'name' => $this->nome,    
                'email' => $this->email,
                'foto' => $this->foto ? $this->foto->store('uploads/usuarios/foto', 'public') : $vendedor->user->foto,
            ]);

            $vendedor_update = $vendedor->update([
                'user_id' => $this->user_id,
                'nome' => $this->nome,
                'email' => $this->email,
                'cpf' => $this->cpf,
                'data_nascimento' => $this->data_nascimento,
                'cep' => $this->cep,
                'endereco' => $this->endereco,
                'numero' => $this->numero,
                'bairro' => $this->bairro,
                'cidade' => $this->cidade,
                'uf' => $this->uf,
                'complemento' => $this->complemento,
                'celular1' => $this->celular1,
                'celular2' => $this->celular2,
                'ativo' => $this->ativo,
                'password' => $vendedor->user->password,
                'percentual_comissao' => 0.00
            ]);

            DB::commit();

            $this->dispatch('alert', 'Vendedor atualizado com sucesso!', 'success', $options);
            return;
           
        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('alert', 'Erro ao atualizar vendedor!' . $e->getMessage(), 'danger', $options);
        }
    }

    public function render()
    {
        return view('livewire.vededores.edit');
    }
}



