<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "nome_completo",
        "usuario",
        "email",
        "senha",
        "cpf",
        "data_nascimento",
        "celular",
        "genero",
        "permissao",
        "created_at",
        "updated_at"
    ];

    public function logs() {
        return $this->hasMany(Logs::class);
    }
}
