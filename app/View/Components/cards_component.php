<?php

namespace App\View\Components;

use App\Models\Usuario;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class cards_component extends Component
{

    public $usuario;

    /**
     * Create a new component instance.
     */
    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cards_component');
    }
}
