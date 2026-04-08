<?php

namespace App\Http\Controllers;

use App\Exports\UsuariosExportar;
use App\Imports\UsuariosImportar;
use App\Models\Usuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ImportarExportar
{
    public function importar(Request $request): RedirectResponse {
        $request->validate([
            "arquivo" => "required"
        ],
    
        [
            "arquivo.required" => "O campo arquivo é obrigatório.",
        ]);

        if (Excel::import(new UsuariosImportar, $request->file("arquivo"))) {

            $cor = "info";

            if (session("tema") == "escuro") {

                $cor = "secondary";

            }

            session(["dadosImportados" => Excel::toCollection(new UsuariosImportar, $request->file("arquivo"))[0]]);

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "success",
                "title" => "Sucesso!",
                "text" => "Arquivo importado com sucesso!",
                "cor" => "$cor"
            ]);
        }

        $cor = "danger";

        if (session("tema") == "escuro") {

            $cor = "dark";

        }

        return redirect()->back()->withInput()->with("alerta", [
            "icon" => "error",
            "title" => "Erro!",
            "text" => "Falha ao tentar importar o arquivo! Tente novamente.",
            "cor" => "$cor"
        ]);        
    }

    public function exportar(Request $request): RedirectResponse {
        $request->validate([
            "formato" => "required"
        ],
    
        [
            "formato.required" => "O campo formato é obrigatório.",
        ]);

        if ($request->input("formato") == "Excel") {

            $exportar = Excel::store(new UsuariosExportar, "excels/usuarios.xlsx", "public");

        } else {

            $pdf = app("dompdf.wrapper");

            $pdf->loadView("tabela", compact(Usuario::all()));

            Storage::disk("public")->makeDirectory("pdfs");

            $caminho = storage_path("app/public/pdfs/usuarios.pdf");
            
            $pdf->save($caminho);
            
            $exportar = response()->download($caminho);
        }

        if ($exportar) {

            $cor = "info";

            if (session("tema") == "escuro") {

                $cor = "secondary";

            }

            session(["dadosExportados" => Usuario::select("nome_completo", "usuario", "email", "cpf", "data_nascimento", "celular", "genero", "permissao")->get()]);

            return redirect()->back()->withInput()->with("alerta", [
                "icon" => "success",
                "title" => "Sucesso!",
                "text" => "Arquivo exportado com sucesso!",
                "cor" => "$cor"
            ]);
        }

        $cor = "danger";

        if (session("tema") == "escuro") {

            $cor = "dark";

        }

        return redirect()->back()->withInput()->with("alerta", [
            "icon" => "error",
            "title" => "Erro!",
            "text" => "Falha ao tentar exportar o arquivo! Tente novamente.",
            "cor" => "$cor"
        ]);
    }
}
