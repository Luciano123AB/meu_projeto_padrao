<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuario extends Authenticatable
{
    use HasFactory,
        SoftDeletes;

    const UPDATED_AT = null;

    protected $fillable = [
        'nome_completo',
        'usuario',
        'email',
        'senha',
        'cpf',
        'data_nascimento',
        'celular',
        'genero',
        'foto',
        'permissao',
        'created_at',
        'updated_at'
    ];

    public function logs() {
        return $this->hasMany(Log::class);
    }
}