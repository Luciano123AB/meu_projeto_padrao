<?php

namespace App\View\Components;

use App\Models\Log;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class logs_component extends Component
{

    public $log;
    public $loop;

    /**
     * Create a new component instance.
     */
    public function __construct(Log $log, $loop)
    {
        $this->log = $log;
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
