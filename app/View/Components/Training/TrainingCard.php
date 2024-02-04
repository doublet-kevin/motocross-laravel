<?php

namespace App\View\Components\Training;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrainingCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public object $training,
        public string $circuitImg,
    ) {
        $this->training = $training;
        $this->circuitImg = $circuitImg;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.training.training-card');
    }
}
