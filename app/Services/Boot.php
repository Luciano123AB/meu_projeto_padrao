<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;

class Boot
{
    public static function criarPovoarBanco() {
        Artisan::call("migrate", [
            "--force" => true
        ]);
        Artisan::call("db:seed", [
            "--class" => "UsuariosTableSeeder",
            "--force" => true
        ]);

        session(["boot" => true]);
    }

    public static function dependencias() {
        shell_exec("composer install 2>&1");
        shell_exec("npm install 2>&1");
    }
}