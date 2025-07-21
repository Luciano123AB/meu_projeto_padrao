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
            $table->id()->autoIncrement();
            $table->string("nome_completo", 80)->nullable();
            $table->string("usuario", 30)->nullable();
            $table->string("email", 30)->nullable();
            $table->string("senha", 60)->nullable();
            $table->string("cpf", 14)->nullable();
            $table->date("data_nascimento", 10)->nullable();
            $table->string("celular", 15)->nullable();
            $table->string("genero", 9)->nullable();
            $table->string("foto", 600)->nullable();
            $table->integer("permissao")->default(1)->comment("1 = Administrador, 0 = Usuário Comum");
            $table->dateTime("ultimo_acesso")->nullable();
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
