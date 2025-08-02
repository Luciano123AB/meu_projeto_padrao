<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeOpcoes extends Controller
{
    public function home() {
        return view("home");
    }
}
