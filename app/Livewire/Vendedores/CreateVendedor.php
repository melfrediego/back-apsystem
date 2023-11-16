<?php

namespace App\Livewire\Vendedores;

use App\Models\User;
use App\Models\Vendedor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class CreateVendedor extends Component
{

    use WithFileUploads;
    
    #[Rule('required|min:10|max:100')] 
    public $nome;

    #[Rule('required|email|min:10|max:150')] 
    public $email;

    #[Rule('required')] 
    public $celular1 = '';
    
    #[Rule('nullable|image|max:1024')] 
    public $foto;

    public $titulo_card_create = 'Criar vendedor';
    public $subtitulo_card_create = 'Utilize o formulário abaixo para criar um novo vendedor';

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

    public $randImage;
    public $msg_erro = '';
    public $msg_sucesso = '';

    public function updatedCep(){

        if ($this->cep){
            $cep_api = Http::get("https://viacep.com.br/ws/{$this->cep}/json/");
            if($cep_api->clientError()){
                dd('nenhum enderço encontrado');
                // Desabilita os campos para inserção
            }
            $result = $cep_api->json();
            $this->endereco = $result["logradouro"];
            $this->bairro = $result["bairro"];
            $this->cidade = $result["localidade"];
            $this->uf = $result["uf"];
            $this->complemento = $result["complemento"];
        }
    }

    public function store(){
        $this->validate();

        if ($this->foto) {
            $foto_user = $this->foto->store('uploads/usuarios/foto', 'public');
        }else{
            $foto_user['foto'] = 'no-preview.png';
        }

        $options = ['showCloseButton' => true, 'timer' => 5];
        try {

            DB::beginTransaction();

            //Criando usuario
            $user = User::create([
                'name' => $this->nome,    
                'email' => $this->email,    
                'ativo' => $this->ativo,  
                'foto' => $foto_user,  
                'is_admin' => false,    
                'password' => bcrypt('123456'),    
            ]);

            // dd($user->password);

            //Criando vendedor
            $vendedor = Vendedor::create([
                'user_id' => $user->id,
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
                'password' => $user->password,
                'percentual_comissao' => 0.00
            ]);

            DB::commit();

            $this->resetFields();
            $this->dispatch('alert', 'Usuário cadastrada com sucesso!', 'success', $options);
            return;

        } catch (\Exception $e) {
             DB::rollBack();
              $this->dispatch('alert', 'Erro ao cadastrar novo vendedor!' . $e->getMessage(), 'danger', $options);
        }
    }

    private function resetFields(){
        $this->reset([
            'nome',
            'email',
            'cpf',
            'data_nascimento',
            'cep',
            'endereco',
            'numero',
            'bairro',
            'cidade',
            'uf',
            'complemento',
            'celular1',
            'celular2',
            'ativo',
            'percentual_comissao'
        ]);

        $this->randImage++;
    }

    public function render()
    {
        return view('livewire.vededores.create');
    }
}
