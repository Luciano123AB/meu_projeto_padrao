<?php

namespace App\Http\Controllers;

use App\Exports\UsuariosExportar;
use App\Imports\UsuariosImportar;
use App\Models\Logs;
use App\Models\Usuario;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            "arquivo" => "required"
        ],
    
        [
            "arquivo.required" => "O campo arquivo é obrigatório",
        ]);

        $importar = Excel::import(new UsuariosImportar, $request->file("arquivo"));
        $dados_importados = Excel::toCollection(new UsuariosImportar, $request->file("arquivo"));

        if ($importar) {
            session(["dadosImportados" => $dados_importados[0]]);

            return redirect()->back()->with("importarSucesso", "Arquivo importado com sucesso!");
        } else {
            return redirect()->back()->with("importarErro", "Falha ao tentar importar o arquivo! Tente novamente.");
        }
    }

    public function exportar(Request $request) {
        $request->validate([
            "formato" => "required"
        ],
    
        [
            "formato.required" => "O campo formato é obrigatório",
        ]);
        
        $formato = $request->input("formato");

        if ($formato == "Excel") {
            $exportar = Excel::store(new UsuariosExportar, "excels/usuarios.xlsx", "public");
        } else {

            $usuarios = Usuario::all();
            $pdf = app("dompdf.wrapper");

            $pdf->loadView("tabela", compact("usuarios"));

            Storage::disk("public")->makeDirectory("pdfs");

            $caminho = storage_path("app/public/pdfs/usuarios.pdf");
            
            $pdf->save($caminho);
            
            $exportar = response()->download($caminho);
        }

        $dados_exportados = Usuario::select("nome_completo", "usuario", "email", "cpf", "data_nascimento", "celular", "genero", "permissao")->get();

        if ($exportar) {
            session(["dadosExportados" => $dados_exportados]);

            return redirect()->back()->with("exportarSucesso", "Arquivo exportado com sucesso!");
        } else {
            return redirect()->back()->with("exportarErro", "Falha ao tentar exportar o arquivo! Tente novamente.");
        }
    }
}
