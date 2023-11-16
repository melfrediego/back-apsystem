<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UploadController;
use App\Livewire\Dashboard\DashboardComponent;
use Illuminate\Support\Facades\Route;
use App\Livewire\Marcas\CreateComponent;
use App\Livewire\Marcas\IndexComponent;
use App\Livewire\Marcas\EditComponent;
use App\Livewire\Categorias\{
    IndexCategoria,
    CreateCategoria,
    EditCategoria
};

use App\Livewire\Usuarios\{
    IndexUsuario,
    CreateUsuario,
    EditUsuario
};

use App\Livewire\Produtos\{
    IndexProduto,
    CreateProduto,
    EditProduto
};
use App\Livewire\Pedidos\{
    IndexPedido,
    CreatePedido,
    EditPedido,
    ShowPedido,
};

use App\Livewire\Clientes\{
    IndexCliente,
    CreateCliente,
    EditCliente,
    ShowCliente,
};

use App\Livewire\Vendedores\{
    IndexVendedor,
    CreateVendedor,
    EditVendedor,
    ShowVendedor,
};

use App\Livewire\ContasPagar\{
    IndexContaPagar,
    CreateContaPagar,
    EditContaPagar,
    ShowContaPagar,
};

use App\Livewire\ContasReceber\{
    IndexContaReceber,
    CreateContaReceber,
    EditContaReceber,
    ShowContaReceber,
};

use App\Livewire\Pagarme\{
    IndexPagarme,
    ShowPagarme,
};

use App\Livewire\Paypal\{
    IndexPaypal,
    ShowPaypal,
};

use App\Livewire\Bling\{
    IndexBling,
    ShowBling,
};

use App\Livewire\Alert;

Route::controller(AuthController::class)->group( function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'login_action')->name('login.action');
    Route::post('logout', 'logout')->middleware('auth')->name('logout');
    Route::get('recupera-senha', 'recupera_senha')->name('recupera-senha');
});

Livewire::component('alert', Alert::class);

Route::middleware('auth')->group(function (){
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', DashboardComponent::class)->name('dashboard');
    Route::get('/dashboard', DashboardComponent::class)->name('dashboard');

    //Usuarios
    Route::get('/usuarios', IndexUsuario::class)->name('usuarios.index');
    Route::get('/usuarios/create', CreateUsuario::class)->name('usuarios.create');
    Route::get('/usuarios/edit/{id}', EditUsuario::class)->name('usuarios.edit');

    //Vendedores
    Route::get('/vendedores', IndexVendedor::class)->name('vendedores.index');
    Route::get('/vendedores/create', CreateVendedor::class)->name('vendedores.create');
    Route::get('/vendedores/edit/{id}', EditVendedor::class)->name('vendedores.edit');

    // Marcas
    Route::get('/marcas', IndexComponent::class)->name('marcas.index');
    Route::get('/marcas/create', CreateComponent::class)->name('marcas.create');
    Route::get('/marcas/edit/{id}', EditComponent::class)->name('marcas.edit');

    //Categorias
    Route::get('/categorias', IndexCategoria::class)->name('categorias.index');
    Route::get('/categorias/create', CreateCategoria::class)->name('categorias.create');
    Route::get('/categorias/edit/{id}', EditCategoria::class)->name('categorias.edit');

    //Produtos
    Route::get('/produtos', IndexProduto::class)->name('produtos.index');
    Route::get('/produtos/create', CreateProduto::class)->name('produtos.create');
    Route::get('/produtos/edit/{id}', EditProduto::class)->name('produtos.edit');
    Route::get('/produtos/upload', CreateProduto::class)->name('produtos.upload');
    Route::post('/uploadDz', [UploadController::class, 'uploadDz'])->name('uploadDz');
    Route::post('/uploadTyneMCE', [UploadController::class, 'uploadTyneMCE'])->name('uploadTyneMCE');
    // Route::get('/produtos/edit/{id}', EditProduto::class)->name('produtos.edit');

    //Pedidos
    Route::get('/pedidos', IndexPedido::class)->name('pedidos.index');
    Route::get('/pedidos/create', CreatePedido::class)->name('pedidos.create');
    Route::get('/pedidos/edit/{id}', EditPedido::class)->name('pedidos.edit');

    //Clientes
    Route::get('/clientes', IndexCliente::class)->name('clientes.index');
    Route::get('/clientes/create', CreateCliente::class)->name('clientes.create');
    Route::get('/clientes/edit/{id}', EditCliente::class)->name('clientes.edit');

    //Contas pagar
    Route::get('/contas-pagar', IndexContaPagar::class)->name('contas-pagar.index');
    Route::get('/contas-pagar/create', CreateContaPagar::class)->name('contas-pagar.create');
    Route::get('/contas-pagar/edit/{id}', EditContaPagar::class)->name('contas-pagar.edit');

    //Contas Receber
    Route::get('/contas-receber', IndexContaReceber::class)->name('contas-receber.index');
    Route::get('/contas-receber/create', CreateContaReceber::class)->name('contas-receber.create');
    Route::get('/contas-receber/edit/{id}', EditContaReceber::class)->name('contas-receber.edit');

    //PagarMe
    Route::get('/pagarme', IndexPagarme::class)->name('pagarme.index');
    Route::get('/pagarme/show', ShowPagarme::class)->name('pagarme.show');

    //Paypal
    Route::get('/paypal', IndexPaypal::class)->name('paypal.index');
    Route::get('/paypal/show', ShowPaypal::class)->name('paypal.show');

    //Bling
    Route::get('/bling', IndexBling::class)->name('bling.index');
    Route::get('/bling/show', ShowBling::class)->name('bling.show');

    
});





