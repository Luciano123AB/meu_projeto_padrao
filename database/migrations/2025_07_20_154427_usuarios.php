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
            $table->id();
            $table->string("nome_completo", 80);
            $table->string("usuario", 30);
            $table->string("email", 100);
            $table->string("senha", 60);
            $table->string("cpf", 14);
            $table->date("data_nascimento", 10);
            $table->string("celular", 14)->comment("(99)99999-9999");
            $table->string("genero", 9)->comment("Masculino | Feminino | Outro");
            $table->longText("foto", 13980320)->nullable()->comment("iVBORw0KGgo...");
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
