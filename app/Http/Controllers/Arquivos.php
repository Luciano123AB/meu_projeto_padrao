<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class Arquivos
{
    public function criarArquivo(Request $request): RedirectResponse {
        $request->validate(
            [
                'texto' => 'required'
            ],

            [
                'texto.required' => 'Digite algo abaixo primeiro.'
            ]
        );

        $arquivos = Storage::disk('arquivos')->allFiles();
        $quantidade = 0;

        foreach ($arquivos as $arquivo) {
            $quantidade++;
        }

        Storage::disk('arquivos')->put('texto' . $quantidade . '.txt', $request->input('texto'));

        return redirect()->back();
    }

    public function subirArquivo(Request $request): RedirectResponse {
        $request->validate(
            [
                'arquivo' => 'required|mimes:txt,jpg,png|max:1024'
            ],

            [
                'arquivo.required' => 'Escolha um arquivo.',
                'arquivo.mimes' => 'Somente arquivos .txt, .jpeg e .png são permitidos.',
                'arquivos.max' => 'O arquivo pode ter no máximo :max MB.'
            ]
        );

        $arquivo = $request->file('arquivo');

        Storage::disk('arquivos')->putFileAs('', $arquivo, $arquivo->getClientOriginalName());

        return redirect()->back();
    }

    public function downloadArquivo($arquivo): BinaryFileResponse {

        $disk = Storage::disk('arquivos');
        $path = $disk->path($arquivo);

        return response()->download($path, $arquivo);
    }

    public function excluirArquivo($arquivo): RedirectResponse {

        $disk = Storage::disk('arquivos');

        $disk->delete($arquivo);

        return redirect()->back();
    }
}
