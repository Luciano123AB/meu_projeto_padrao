<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsuariosExportar implements FromCollection
{
    public function collection() {
        return Usuario::all();
    }
}
