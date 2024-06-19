<?php

use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::get('/usuario/{id}/{nome?}', function ($id, $nome = 'Anônimo') {
    return 'Usuário '.$nome.' - id: '.$id;
})->name('usuario');

Route::get('perfil/{user:email}', function (User $user) {
    return dd($user);
});

Route::prefix('loja')->group(function () {
    Route::get('', function () {
        return 'Página raíz do grupo de rota loja';
    })->name('loja');

    Route::get('id/{idLoja}', function ($idUsuario) {
        return 'Id da loja é: '.$idUsuario;
    })->name('loja.id');

    Route::get('nomeLoja/{nomeLoja}', function ($nomeLoja) {
        return 'Nome da loja é: '.$nomeLoja;
    });
})->name('loja.nomeLoja');
