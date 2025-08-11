<?php

use App\Http\Controllers\CadastroUpdate;
use App\Http\Controllers\Deletar;
use App\Http\Controllers\HomeOpcoes;
use App\Http\Controllers\LoginLogout;
use App\Http\Controllers\TabelaCards;
use App\Http\Middleware\VerificarEstaLogado;
use App\Http\Middleware\VerificarNaoEstaLogado;
use Illuminate\Support\Facades\Route;

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
});