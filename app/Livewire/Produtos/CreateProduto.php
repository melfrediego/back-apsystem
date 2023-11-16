<?php

namespace App\Livewire\Produtos;

use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Categoria;
use App\Livewire\Utils\Alert;
use App\Models\DisponibilidadeProduto;
use App\Models\EstoqueAcabar;
use App\Models\ImagemProduto;
use App\Models\Marca;
use App\Models\Produto;
use Illuminate\Http\Request;

class CreateProduto extends Component
{
    use WithFileUploads;

    private $dolarHoje = 0.20;
    private $euroHoje = 0.19;
    
    #[Rule('required', message: 'Campo nome preenchimento obrigatório!')] 
    #[Rule('min:6', message: 'Campo minimo de 6 caracteres!')] 
    #[Rule('max:100', message: 'Campo máximo 100 caracteres!')] 
    public $nome;

    #[Rule('required', message: 'Campo obrigatório!')] 
    public $estoque_sku;

    #[Rule('required', message: 'Campo obrigatório!')] 
    public $preco_venda = '';
    
    #[Rule('nullable|image|max:1024')] 
    public $logo;

    public $images_produto = [];

    public $randImage;
    
    public $produtos;
    public $produtos_id;
    // public $nome;
    public $video_url;
    public $descricao;
    public $preco_custo = '';
    // public $preco_venda;
    public $preco_venda_dolar;
    public $preco_venda_euro;
    public $preco_promo = '';
    // public $estoque_sku;
    public $estoque_gtin;
    public $estoque_npm;
    public $estoque_ncm;
    public $gerenciar_estoque = true;
    public $estoque_quantidade;
    public $disponibilidade_id;
    public $estoque_acabar_id;
    public $peso;
    public $altura;
    public $largura;
    public $profundidade;
    public $categoria_id;
    public $marca_id;
    public $seo_tag_titulo;
    public $seo_meta_tag_descricao;
    public $seo_url;
    public $preco_sob_consulta;
    public $ativo = true;
    public $variacao;
    public $destaque;
    public $situacao = 'N';
    public $logoPreview;

    public $gerenciar_estoque_visibilit = true;
    // public $disponibilidades_select;

    public $cardTitulo = 'Criar produto';
    public $cardSubtituloTitulo = 'Utilize o formulário abaixo para criar uma novo produto';


    public function amout(Produto $produto){
        //$this->inicializaPreco();
    }
    
    public function store(){

        

        $this->validate();

        //OBS tem que fazer uma verificação para saber se existe ao menos 1 imagem
        // Lembrar de limpar e deixar so os campos vindo do formulario
        $data = [
            'nome' => $this->nome,
            'descricao' => $this->descricao,
            'video_url' => $this->video_url ? $this->video_url : 'https://www.youtube.com/watch?v=nyQxjY783Mw',
            'preco_custo' => $this->formataMoedaConversao($this->preco_custo),
            'preco_venda' => $this->formataMoedaConversao($this->preco_venda),
            'preco_venda_dolar' => $this->preco_venda_dolar,
            'preco_venda_euro' => $this->preco_venda_euro,
            'preco_promo' => $this->formataMoedaConversao($this->preco_promo),
            'estoque_sku' => $this->estoque_sku,
            'estoque_gtin' => $this->estoque_gtin,
            'estoque_npm' => $this->estoque_npm,
            'estoque_ncm' => $this->estoque_ncm,
            'gerenciar_estoque' => $this->checkboxValueSN($this->gerenciar_estoque),
            'estoque_quantidade' => $this->estoque_quantidade,
            'disponibilidade_id' => $this->disponibilidade_id ? $this->disponibilidade_id : 1,
            'estoque_acabar_id' => $this->estoque_acabar_id ? $this->estoque_acabar_id : 2,
            'peso' => $this->peso,
            'altura' => $this->altura,
            'largura' => $this->largura,
            'profundidade' => $this->profundidade,
            'categoria_id' => $this->categoria_id ?? 1,
            'marca_id' => $this->marca_id ?? 1,
            'seo_tag_titulo' => $this->seo_tag_titulo ? $this->seo_tag_titulo : 'Produtos Ana Paula, AP Professinal',
            'seo_meta_tag_descricao' => $this->seo_meta_tag_descricao ?? 'Descrição para meta tagas',
            'seo_url' => $this->seo_url ?? 'https://anapaulacarvalho.com',
            'preco_sob_consulta' => $this->preco_sob_consulta,
            'ativo' => $this->checkboxValueSN($this->ativo),
            'variacao' => $this->checkboxValueSN($this->variacao),
            'destaque' => $this->checkboxValueSN($this->destaque),
            'situacao' => $this->situacao,
        ];


        $options = ['showCloseButton' => false, 'timer' => 5];
        try {
            $produto = Produto::create($data);
            $data_imagens = [];
            if($this->images_produto){
                foreach ($this->images_produto as $key => $image) {
                    $produto->imagens()->create([
                        'path' => $image,
                        'img_capa' => $key == 0 ? true : false,
                    ]);
                }
            }

            $this->resetFields();

            session()->flash('success', 'Produto cadastrado com sucesso!');
            
            $this->redirect('/produtos/create');

            // $this->dispatch('alert', 'Produto cadastrada com sucesso!', 'success', $options);
            // return redirect()->to('/produtos/create')->with('success', 'Produto cadastrada com sucesso!');

        } catch (\Exception $e) {
            $this->dispatch('alert', 'Erro ao cadastrar novo produto!' . $e->getMessage() , 'danger', $options);
            return;
        }   
    }

    private function checkboxValueSN($value)
    {
        return $value ? 'S' : 'N';
    }

    // private function radioValueNU($value)
    // {
    //     return $value ? 'N' : 'U';
    // }

     private function resetFields()
    {
        $this->reset([
            'produtos',
            'produtos_id',
            'nome',
            'descricao',
            'video_url',
            'preco_custo',
            'preco_venda',
            'preco_venda_dolar',
            'preco_venda_euro',
            'preco_promo',
            'estoque_sku',
            'estoque_gtin',
            'estoque_npm',
            'estoque_ncm',
            'gerenciar_estoque',
            'estoque_quantidade',
            'disponibilidade_id',
            'estoque_acabar_id',
            'peso',
            'altura',
            'largura',
            'profundidade',
            'categoria_id',
            'marca_id',
            'seo_tag_titulo',
            'seo_meta_tag_descricao',
            'seo_url',
            'preco_sob_consulta',
            'ativo',
            'variacao',
            'destaque',
            'situacao',
            'logoPreview',
        ]);
    }

    public $listeners = [
    'chageMarca'
    ];

    public function chageMarca($value){
        $this->marca_id = $value;
    }


    //Melhora função caso exista valor promocional tem que converter de acordo com o valor promocional
    public function realDolar(){
        if ((float)$this->preco_venda != 0){
            $preco_dolar = $this->formataMoedaConversao($this->preco_venda) * $this->dolarHoje;
            $this->preco_venda_dolar = $this->formatCurrency($preco_dolar, 'USD');

            $preco_euro = $this->formataMoedaConversao($this->preco_venda) * $this->euroHoje;
            $this->preco_venda_euro = $this->formatCurrency($preco_euro, 'EUR');
        }  
    }

    public function realEuro(){
        $preco_euro = $this->preco_venda * $this->dolarHoje;
        $this->preco_venda_euro = $preco_euro;
    }

    public function formatCurrency($value, $currency){
        switch ($currency) {
            case 'USD':
                // $formatted = '$ ' . number_format($value, 2);
                $formatted = number_format($value, 2);
                break;
            case 'EUR':
                // $formatted = '€ ' . number_format($value, 2);
                $formatted = number_format($value, 2);
                break;
            default:
                $formatted = number_format($value, 2) . ' ' . $currency;
        }
        return $formatted;
    }

    public function formataMoedaConversao($value){
        $valorNumerico = str_replace(['.', ','], ['', '.'], $value);
        return (float) $valorNumerico;
    }

    // public function 
   
    public function render()
    {
        $disponibilidades_select = DisponibilidadeProduto::all();
        $estoque_acabar_select = EstoqueAcabar::all();
        $categorias_select = Categoria::all();
        $marcas_select = Marca::all();

        return view('livewire.produtos.create', [
            "disponibilidades_select" => $disponibilidades_select,
            "estoque_acabar_select" => $estoque_acabar_select,
            "categorias_select" => $categorias_select,
            "marcas_select" => $marcas_select,
        ]);
    }
}
