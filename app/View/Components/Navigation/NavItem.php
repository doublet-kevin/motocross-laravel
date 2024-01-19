<?php

namespace App\View\Components\Navigation;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public string $route,
    ) {
        $this->name = $name;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation.nav-item');
    }
}
