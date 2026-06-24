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
            $table->string('nome_completo', 80);
            $table->string('usuario', 30)->unique();
            $table->string('email', 100)->unique();
            $table->string('senha', 60);
            $table->string('cpf', 14)->unique()->comment('000.000.000-00');
            $table->date('data_nascimento', 10);
            $table->string('celular', 14)->unique()->comment('(99)99999-9999');
            $table->string('genero', 9)->comment('Masculino | Feminino | Outro');
            $table->string('foto', 34)->nullable()->comment('Ex: nome_foto.png');
            $table->integer('permissao')->default(1)->comment('1 = Administrador | 0 = Visitante');
            $table->dateTime('ultimo_acesso')->nullable();
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
