<?php

namespace App\View\Components;

use App\Models\Usuario;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class pesquisa_component extends Component
{

    public $usuario;
    public $loop;

    /**
     * Create a new component instance.
     */
    public function __construct(Usuario $usuario, $loop)
    {
        $this->usuario = $usuario;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pesquisa_component');
    }
}
