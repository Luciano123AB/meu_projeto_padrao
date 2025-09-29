<?php

use App\Http\Controllers\CadastroUpdate;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\Deletar;
use App\Http\Controllers\HomeOpcoes;
use App\Http\Controllers\ImportarExportar;
use App\Http\Controllers\LoginLogout;
use App\Http\Controllers\Logs;
use App\Http\Controllers\Permissao;
use App\Http\Controllers\PesquisarBuscar;
use App\Http\Controllers\TabelaCards;
use App\Http\Controllers\Tema;
use App\Http\Middleware\VerificarEstaLogado;
use App\Http\Middleware\VerificarNaoEstaLogado;
use Illuminate\Support\Facades\Route;

Route::get("/trocarTema", [Tema::class, "trocarTema"])->name("trocarTema");

Route::middleware([VerificarEstaLogado::class])->group(function () {
    Route::get("/", [LoginLogout::class, "login"])->name("login");

    Route::post("/loginSubmit", [LoginLogout::class, "loginSubmit"])->name("loginSubmit");

    Route::get("/cadastro", [CadastroUpdate::class, "cadastro"])->name("cadastro");

    Route::post("/cadastroSubmit", [CadastroUpdate::class, "cadastroSubmit"])->name("cadastroSubmit");
});

Route::middleware([VerificarNaoEstaLogado::class])->group(function () {
    Route::get("/home", [HomeOpcoes::class, "home"])->name("home");

    Route::get("/logout", [LoginLogout::class, "logout"])->name("logout");    

    Route::get("/update/{id}", [CadastroUpdate::class, "update"])->name("update");

    Route::post("/updateSubmit", [CadastroUpdate::class, "updateSubmit"])->name("updateSubmit");

    Route::get("/deletar/{id}", [Deletar::class, "deletar"])->name("deletar");

    Route::get("/deletarConfirmar/{id}", [Deletar::class, "deletarConfirmar"])->name("deletarConfirmar");

    Route::get("/tabela", [TabelaCards::class, "tabela"])->name("tabela");

    Route::get("/permissao/{id}", [Permissao::class, "permissao"])->name("permissao");

    Route::get("/permissaoConfirmar/{id}", [Permissao::class, "permissaoConfirmar"])->name("permissaoConfirmar");

    Route::get("/cards", [TabelaCards::class, "cards"])->name("cards");

    Route::get("/dashboard", [Dashboard::class, "dashboard"])->name("dashboard");

    Route::get("/pesquisa", [PesquisarBuscar::class, "pesquisa"])->name("pesquisa");

    Route::post("/pesquisaUsuario", [PesquisarBuscar::class, "pesquisaUsuario"])->name("pesquisaUsuario");

    Route::post("/pesquisaStatus", [PesquisarBuscar::class, "pesquisaStatus"])->name("pesquisaStatus");

    Route::post("/pesquisaDataNascimento", [PesquisarBuscar::class, "pesquisaDataNascimento"])->name("pesquisaDataNascimento");

    Route::post("/pesquisaDataInicialFinal", [PesquisarBuscar::class, "pesquisaDataInicialFinal"])->name("pesquisaDataInicialFinal");

    Route::get("/cep/{cep}", [PesquisarBuscar::class, 'buscar']);

    Route::get("/endereco", function () {
        return view("endereco");
    })->name("buscar");

    Route::get("/logs/{id}", [Logs::class, "logs"])->name("logs");

    Route::get("/limparLogs/{id}", [Logs::class, "limparLogs"])->name("limparLogs");

    Route::get("/importarExportar", [ImportarExportar::class, "importarExportar"])->name("importarExportar");

    Route::post("/importar", [ImportarExportar::class, "importar"])->name("importar");

    Route::get("/exportar", [ImportarExportar::class, "exportar"])->name("exportar");    
});
