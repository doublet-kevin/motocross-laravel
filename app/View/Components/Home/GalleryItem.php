<?php

namespace App\View\Components\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GalleryItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $src,
    ) {
        $this->src = $src;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('_components.home.gallery-item');
    }
}
