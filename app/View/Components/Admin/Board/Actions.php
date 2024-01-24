<?php

namespace App\View\Components\Admin\Board;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Actions extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $route,
        public string $icon,
        public string $alt,
    ) {
        $this->route = $route;
        $this->icon = $icon;
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.board.actions');
    }
}
