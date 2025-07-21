<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("usuarios")->insert([
            [
                "nome_completo" => "Admin",
                "usuario" => "Administrador",
                "email" => "admin@gmail.com",
                "senha" => bcrypt("24032004ABCD123"),
                "cpf" => "121.098.019-30",
                "data_nascimento" => "2004-03-24",
                "celular" => "(55) 98127-7036",
                "genero" => "Masculino",
                "foto" => "https://drive.google.com/file/d/1uIFVxSBB8XNN3OuxvbaAZMIwuXEcxttV/view?usp=drive_link",
                "permissao" => 1,
                "created_at" => date("Y-m-d H:i:s")
            ]
        ]);
    }
}
