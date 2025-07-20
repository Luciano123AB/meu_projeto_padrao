<?php

use App\Http\Controllers\LoginLogout;
use App\Http\Middleware\VerificarEstaLogado;
use App\Http\Middleware\VerificarNaoEstaLogado;
use Illuminate\Support\Facades\Route;

Route::middleware([VerificarEstaLogado::class])->group(function () {    
    Route::get("/", [LoginLogout::class, "login"])->name("login");

    Route::post("/loginSubmit", [LoginLogout::class, "loginSubmit"])->name("loginSubmit");
});

Route::middleware([VerificarNaoEstaLogado::class])->group(function () {
    
});