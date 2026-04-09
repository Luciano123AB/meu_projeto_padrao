<?php

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
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::get("trocarTema", [Tema::class, "trocarTema"])->name("trocarTema");
    
    Route::controller(MainController::class)->group(function() {
        Route::middleware([VerificarDeslogado::class])->group(function () {
            Route::get("home", "home")->name("home"); 

            Route::get("update/{id}", "update")->name("update");

            Route::get("mudar_senha", "mudarSenha")->name("mudar_senha");

            Route::get("tabela", "tabela")->name("tabela");

            Route::get("cards", "cards")->name("cards");

            Route::get("dashboard", "dashboard")->name("dashboard");

            Route::get("pesquisa", "pesquisa")->name("pesquisa");

            Route::get("endereco", "endereco")->name("endereco");

            Route::get("logs/{id}", "logs")->name("logs");

            Route::get("importarExportar", "importarExportar")->name("importarExportar");
        });

        Route::middleware([VerificarLogado::class])->group(function () {
            Route::get("", "login")->name("login");
            Route::post("loginSubmit", [LoginLogout::class, "loginSubmit"])->name("loginSubmit");

            Route::get("cadastro", "cadastro")->name("cadastro");
            Route::post("cadastroSubmit", [CadastroUpdate::class, "cadastroSubmit"])->name("cadastroSubmit");
        });
    });

    Route::middleware([VerificarDeslogado::class])->group(function () {
        Route::get("logout", [LoginLogout::class, "logout"])->name("logout");    

        Route::controller(CadastroUpdate::class)->group(function() {
            Route::post("updateSubmit", "updateSubmit")->name("updateSubmit");

            Route::post("mudar_senha_submit", "mudarSenhaSubmit")->name("mudar_senha_submit");
        });

        Route::controller(Deletar::class)->group(function() {
            Route::get("deletar/{id}", "deletar")->name("deletar");
            Route::get("deletarConfirmar/{id}", "deletarConfirmar")->name("deletarConfirmar");
        });

        Route::controller(Permissao::class)->group(function() {
            Route::get("permissao/{id}", "permissao")->name("permissao");
            Route::get("permissaoConfirmar/{id}", "permissaoConfirmar")->name("permissaoConfirmar");
        });

        Route::controller(PesquisarBuscar::class)->group(function() {
            Route::post("pesquisaUsuario", "pesquisaUsuario")->name("pesquisaUsuario");
            Route::post("pesquisaStatus", "pesquisaStatus")->name("pesquisaStatus");
            Route::post("pesquisaDataNascimento", "pesquisaDataNascimento")->name("pesquisaDataNascimento");
            Route::post("pesquisaDataInicialFinal", "pesquisaDataInicialFinal")->name("pesquisaDataInicialFinal");
            Route::post("pesquisaMes", "pesquisaMes")->name("pesquisaMes");
            Route::post("pesquisaMesInicialFinal", "pesquisaMesInicialFinal")->name("pesquisaMesInicialFinal");
            
            Route::get("cep/{cep}", "buscar")->name("buscar");
            Route::get("cnpj/{cnpj}", "consultar")->name("consultar");
        });

        Route::controller(Logs::class)->group(function() {
            Route::get("limparLogs/{id}", "limparLogs")->name("limparLogs");
            Route::get("limparLog/{id}", "limparLog")->name("limparLog");
        });

        Route::controller(ImportarExportar::class)->group(function() {
            Route::post("importar", "importar")->name("importar");
            Route::get("exportar", "exportar")->name("exportar");
        });
    });
});
