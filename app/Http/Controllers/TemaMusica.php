<?php

namespace App\Http\Controllers;

class TemaMusica
{
    public function trocarTema() {
        if (!session()->has("tema")) {
            session(["tema" => "escuro"]);

            return redirect()->back();
        } else {
            if (session("tema") == "claro") {
                session(["tema" => "escuro"]);

                return redirect()->back();
            }

            if (session("tema") == "escuro") {
                session(["tema" => "claro"]);

                return redirect()->back();
            }
        }
    }

    public function tocarMusica() {
        if (!session()->has("musica")) {
            session(["musica" => "desativado"]);

            return redirect()->back();
        } else {
            if (session("musica") == "ativado") {
                session(["musica" => "desativado"]);

                return redirect()->back();
            }

            if (session("musica") == "desativado") {
                session(["musica" => "ativado"]);

                return redirect()->back();
            }
        }
    }
}
