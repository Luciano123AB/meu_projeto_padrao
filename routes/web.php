<?php

use App\Http\Controllers\CadastroUpdate;
use App\Http\Controllers\Deletar;
use App\Http\Controllers\ImportarExportar;
use App\Http\Controllers\LoginLogout;
use App\Http\Controllers\Logs;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Permissao;
use App\Http\Controllers\PesquisarBuscar;
use App\Http\Controllers\TemaMusica;
use App\Http\Middleware\VerificarEstaLogado;
use App\Http\Middleware\VerificarNaoEstaLogado;
use Illuminate\Support\Facades\Route;

Route::prefix("/")->group(function () {
    Route::get("trocarTema", [TemaMusica::class, "trocarTema"])->name("trocarTema");

    Route::get("tocarMusica", [TemaMusica::class, "tocarMusica"])->name("tocarMusica");
    
    Route::middleware([VerificarEstaLogado::class])->group(function () {
        Route::get("", [MainController::class, "login"])->name("login");
        Route::post("loginSubmit", [LoginLogout::class, "loginSubmit"])->name("loginSubmit");

        Route::get("cadastro", [MainController::class, "cadastro"])->name("cadastro");
        Route::post("cadastroSubmit", [CadastroUpdate::class, "cadastroSubmit"])->name("cadastroSubmit");
    });

    Route::middleware([VerificarNaoEstaLogado::class])->group(function () {
        Route::get("home", [MainController::class, "home"])->name("home");

        Route::get("logout", [LoginLogout::class, "logout"])->name("logout");    

        Route::get("update/{id}", [MainController::class, "update"])->name("update");
        Route::post("updateSubmit", [CadastroUpdate::class, "updateSubmit"])->name("updateSubmit");

        Route::get("deletar/{id}", [Deletar::class, "deletar"])->name("deletar");
        Route::get("deletarConfirmar/{id}", [Deletar::class, "deletarConfirmar"])->name("deletarConfirmar");

        Route::get("tabela", [MainController::class, "tabela"])->name("tabela");

        Route::get("permissao/{id}", [Permissao::class, "permissao"])->name("permissao");
        Route::get("permissaoConfirmar/{id}", [Permissao::class, "permissaoConfirmar"])->name("permissaoConfirmar");

        Route::get("cards", [MainController::class, "cards"])->name("cards");

        Route::get("dashboard", [MainController::class, "dashboard"])->name("dashboard");

        Route::get("pesquisa", [MainController::class, "pesquisa"])->name("pesquisa");
        Route::post("pesquisaUsuario", [PesquisarBuscar::class, "pesquisaUsuario"])->name("pesquisaUsuario");
        Route::post("pesquisaStatus", [PesquisarBuscar::class, "pesquisaStatus"])->name("pesquisaStatus");
        Route::post("pesquisaDataNascimento", [PesquisarBuscar::class, "pesquisaDataNascimento"])->name("pesquisaDataNascimento");
        Route::post("pesquisaDataInicialFinal", [PesquisarBuscar::class, "pesquisaDataInicialFinal"])->name("pesquisaDataInicialFinal");
        Route::post("pesquisaMes", [PesquisarBuscar::class, "pesquisaMes"])->name("pesquisaMes");
        Route::post("pesquisaMesInicialFinal", [PesquisarBuscar::class, "pesquisaMesInicialFinal"])->name("pesquisaMesInicialFinal");

        Route::get("endereco", [MainController::class, "endereco"])->name("endereco");
        Route::get("cep/{cep}", [PesquisarBuscar::class, "buscar"])->name("buscar");
        Route::get("cnpj/{cnpj}", [PesquisarBuscar::class, "consultar"])->name("consultar");

        Route::get("logs/{id}", [MainController::class, "logs"])->name("logs");
        Route::get("limparLogs/{id}", [Logs::class, "limparLogs"])->name("limparLogs");

        Route::get("importarExportar", [MainController::class, "importarExportar"])->name("importarExportar");
        Route::post("importar", [ImportarExportar::class, "importar"])->name("importar");
        Route::get("exportar", [ImportarExportar::class, "exportar"])->name("exportar");
    });
});
