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
        Schema::create('logs', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment("...");
            $table->integer("usuario_id")->nullable()->comment("...");
            $table->string("pagina", 20)->nullable()->comment("...");
            $table->dateTime("data_hora")->nullable()->comment("00/00/0000 00:00:00");
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
