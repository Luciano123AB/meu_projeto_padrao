<?php

use App\Http\Controllers\Arquivos;
use App\Http\Controllers\CadastroUpdate;
use App\Http\Controllers\Deletar;
use App\Http\Controllers\ImportarExportar;
use App\Http\Controllers\LoginLogout;
use App\Http\Controllers\Logs;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Permissao;
use App\Http\Controllers\PesquisarBuscar;
use App\Http\Controllers\Tema;
use App\Http\Middleware\VerificarLogado;
use App\Http\Middleware\VerificarDeslogado;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('trocar-tema', [Tema::class, 'trocarTema'])->name('trocar.tema');
    
    Route::controller(MainController::class)->group(function() {
        Route::middleware([VerificarDeslogado::class])->group(function () {
            Route::get('home', 'home')->name('home');

            Route::get('update/{id}', 'update')->name('update');

            Route::get('mudar-senha', 'mudarSenha')->name('mudar.senha');

            Route::get('tabela', 'tabela')->name('tabela');

            Route::get('cards', 'cards')->name('cards');

            Route::get('dashboard', 'dashboard')->name('dashboard');

            Route::get('pesquisa', 'pesquisa')->name('pesquisa');

            Route::get('endereco', 'endereco')->name('endereco');

            Route::get('logs/{id}', 'logs')->name('logs');

            Route::get('importar-exportar', 'importarExportar')->name('importarExportar');

            Route::get('arquivos', 'arquivos')->name('arquivos');
        });

        Route::middleware([VerificarLogado::class])->group(function () {
            Route::get('', 'login')->name('login');
            Route::post('login-submit', [LoginLogout::class, 'loginSubmit'])->name('loginSubmit');

            Route::get('cadastro', 'cadastro')->name('cadastro');
            Route::post('cadastro-submit', [CadastroUpdate::class, 'cadastroSubmit'])->name('cadastroSubmit');
        });
    });

    Route::middleware([VerificarDeslogado::class])->group(function () {
        Route::get('logout', [LoginLogout::class, 'logout'])->name('logout');    

        Route::controller(CadastroUpdate::class)->group(function() {
            Route::post('update-submit', 'updateSubmit')->name('updateSubmit');

            Route::post('mudar-senha-submit', 'mudarSenhaSubmit')->name('mudar.senha.submit');
        });

        Route::controller(Deletar::class)->group(function() {
            Route::get('deletar/{id}', 'deletar')->name('deletar');
            Route::get('deletar-confirmar/{id}', 'deletarConfirmar')->name('deletar.confirmar');
        });

        Route::controller(Permissao::class)->group(function() {
            Route::get('permissao/{id}', 'permissao')->name('permissao');
            Route::get('permissao-confirmar/{id}', 'permissaoConfirmar')->name('permissao.confirmar');
        });

        Route::controller(PesquisarBuscar::class)->group(function() {
            Route::post('pesquisa-usuario', 'pesquisaUsuario')->name('pesquisa.usuario');
            Route::post('pesquisa/data-nascimento', 'pesquisaDataNascimento')->name('pesquisa.data.nascimento');
            Route::post('pesquisa-status', 'pesquisaStatus')->name('pesquisa.status');
            Route::post('pesquisa/data-inicial-final', 'pesquisaDataInicialFinal')->name('pesquisa.data.inicial.final');
            Route::post('pesquisa-mes', 'pesquisaMes')->name('pesquisa.mes');
            Route::post('pesquisa/mes-inicial-final', 'pesquisaMesInicialFinal')->name('pesquisa.mes.inicial.final');
            
            Route::get('cep/{cep}', 'buscar')->name('buscar');
            Route::get('cnpj/{cnpj}', 'consultar')->name('consultar');
        });

        Route::controller(Logs::class)->group(function() {
            Route::get('limpar-logs/{id}', 'limparLogs')->name('limpar.logs');
            Route::get('limpar-log/{id}', 'limparLog')->name('limpar.log');
        });

        Route::controller(ImportarExportar::class)->group(function() {
            Route::post('importar', 'importar')->name('importar');
            Route::get('exportar', 'exportar')->name('exportar');
        });

        Route::controller(Arquivos::class)->group(function() {
            Route::post('criar-arquivo', 'criarArquivo')->name('criar.arquivo');
            Route::post('subir-arquivo', 'subirArquivo')->name('subir.arquivo');
            Route::get('download-arquivo/{arquivo}', 'downloadArquivo')->name('download.arquivo');
            Route::get('excluir-arquivo/{arquivo}', 'excluirArquivo')->name('excluir.arquivo');
        });
    });

    Route::fallback(function(): RedirectResponse {
        return redirect()->route('home');
    });
});
