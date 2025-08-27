<?php

namespace App\Http\Controllers;

use App\Exports\UsuariosExportar;
use App\Imports\UsuariosImportar;
use App\Models\Logs;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportarExportar
{
    public function importarExportar() {

        $id = session("usuario.id");
        $log = new Logs();
        $log->usuario_id = $id;
        $log->pagina = "Importar / Exportar";
        $log->data_hora = date("Y-m-d H:i:s");        
        
        $log->save();

        return view("importar_exportar");
    }

    public function importar(Request $request) {
        $request->validate([
            "arquivo" => "required|mimes:xlsx,xls"
        ],
    
        [
            "arquivo.required" => "O campo arquivo é obrigatório",
            'arquivo.mimes" => "O arquivo deve estar no formato ".xlsx" ou ".xls"'
        ]);

        Excel::import(new UsuariosImportar, $request->file("arquivo"));

        return redirect()->back()->with("importarSucesso", "Arquivo importado com sucesso!");
    }

    public function exportar() {        
        Excel::download(new UsuariosExportar, "usuarios.xlsx");

        return redirect()->back()->with("exportarSucesso", "Arquivo exportado com sucesso!");
    }
}
