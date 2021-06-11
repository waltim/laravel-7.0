<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// adicionando um middleware diretamente na rota.
// Route::get('/', 'PrincipalController@principal')->middleware(LogAcessoMiddleware::class)->name('site.index');
// Route::get('/', 'PrincipalController@principal')->middleware('log.acesso')->name('site.index');
Route::get('/', 'PrincipalController@principal')->name('site.index');
Route::get('/sobre', 'SobreController@sobre')->name('site.sobre');
Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::prefix('/app')->middleware('autenticacao:padrao,visitante')->group(function(){
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/clientes', 'ClienteController@index')->name('app.clientes');

    Route::get('/fornecedores', 'FornecedorController@index')->name('app.fornecedores');
    Route::post('/fornecedores/listar', 'FornecedorController@listar')->name('app.fornecedores.listar');
    Route::get('/fornecedores/listar', 'FornecedorController@listar')->name('app.fornecedores.listar');
    Route::get('/fornecedores/adicionar/{msg?}', 'FornecedorController@adicionar')->name('app.fornecedores.adicionar');
    Route::post('/fornecedores/adicionar', 'FornecedorController@adicionar')->name('app.fornecedores.adicionar');
    Route::get('/fornecedores/editar/{id}/{msg?}', 'FornecedorController@editar')->name('app.fornecedores.editar')->where('id', '[0-9]+');
    Route::get('/fornecedores/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedores.excluir')->where('id', '[0-9]+');

    Route::resource('produto', 'ProdutoController');
});


Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->where('p1', '[0-9]+')->where('p2', '[0-9]+')->name('teste');

//rota de fallback

Route::fallback(function(){
    return 'Desculpe, página não encontrada.';
});

//redirecinamento de rotas

// Route::get('/rota1', function(){
//     echo 'Rota 1';
// })->name('site.rota1');

// Route::get('/rota2', function(){
//    return redirect()->route('site.rota1');
// })->name('site.rota2');

// Route::redirect('/rota2', '/rota1', 301);

//rotas com parametros obrigatórios e opcionais;
// tipos de atributos e clausulas para validar os parametros enviados;

// Route::get('/contato/{nome}/{categoria_id?}',
//  function(
//      string $nome = 'Desconhecido',
//      int $categoria_id = 1
// ){
//     echo 'nome: '.$nome.'<br>';
//     echo 'categoria: '.$categoria_id.'<br>';

// })->where('categoria_id','[0-9]+')->where('nome', '[A-Za-z]+');
