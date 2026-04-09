<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class importar extends Component
{

    public $dados;
    public $loop;

    /**
     * Create a new component instance.
     */
    public function __construct($dados, $loop)
    {
        $this->dados = $dados;
        $this->loop = $loop;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.importar');
    }
}
