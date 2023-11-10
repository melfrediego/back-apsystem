<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\ProdutoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// JWT Tymon
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

// Route::controller(ProdutoController::class)->group(function () {
//     Route::get('index', 'index');
// });

Route::prefix('v1')->namespace('Api')->group(function(){
    //Produtos
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produtos.index');


    //Categorias
    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
});




// Route::post('/login-jwt', [AuthController::class, 'login'])->name('login');

// Route::post('/login-jwt', function (Request $request) {
//     $credentials = $request->only(['email', 'password']);

//     //informando o guard API, porque o padrão é Web 
//     if (!$token = auth('api')->attempt($credentials)) {
//         abort(401,'Anauthorized');
//     }

//     return response()->json([
//         'data' => [
//             'token' => $token,
//             'token_type' => 'bearer',
//             'expires_in' => auth('api')->factory()->getTTL() * 60
//         ]
//         ]);
// });


//JWT Sanctun
// Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
