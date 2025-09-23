<?php

namespace App\Services;

use Illuminate\Support\Facades\Artisan;

class Boot
{
    public static function comandos() {
        Artisan::call("migrate", [
            "--force" => true
        ]);
        Artisan::call("db:seed", [
            "--class" => "UsuariosTableSeeder",
            "--force" => true
        ]);

        session(["boot" => true]);
    }
}