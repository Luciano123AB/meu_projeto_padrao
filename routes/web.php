<?php

use App\Http\Controllers\MainController;
use App\Http\Middleware\VerificarNaoEstaLogado;
use Illuminate\Support\Facades\Route;

Route::middleware([VerificarNaoEstaLogado::class])->group(function () {
    Route::get("/login", [MainController::class, "login"])->name("login");
});