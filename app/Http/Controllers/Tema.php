<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tema
{
    public function trocarTema() {
        if (!session()->has("tema")) {
            session(["tema" => "escuro"]);
        }

        if (session("tema") == "escuro") {
            session(["tema" => "claro"]);
        } else {
            session(["tema" => "escuro"]);
        }

        return redirect()->back();
    }
}
