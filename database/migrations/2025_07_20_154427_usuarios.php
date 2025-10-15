<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment("...");
            $table->string("nome_completo", 80)->nullable()->comment("...");
            $table->string("usuario", 30)->nullable()->comment("Usuario123ABC");
            $table->string("email", 100)->nullable()->comment("usuario@gmail.com");
            $table->string("senha", 60)->nullable()->comment("...");
            $table->string("cpf", 14)->nullable()->comment("000.000.000-00");
            $table->date("data_nascimento", 10)->nullable()->comment("00/00/0000");
            $table->string("celular", 14)->nullable()->comment("(99)99999-9999");
            $table->string("genero", 9)->nullable()->comment("Masculino | Feminino | Outro");
            $table->longText("foto", 13980320)->comment("...");
            $table->integer("permissao")->default(1)->comment("1 = Administrador | 0 = Usuário Comum");
            $table->dateTime("ultimo_acesso")->nullable()->comment("00/00/0000 00:00:00");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
