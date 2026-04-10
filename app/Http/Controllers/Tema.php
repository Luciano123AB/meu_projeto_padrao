<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class Tema
{
    public function trocarTema(): RedirectResponse {
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
}
