<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Recipe;

class CardResep extends Component
{
    public $recipe;

    /**
     * Create a new component instance.
     */
    public function __construct($recipe)
    {
        $this->recipe = $recipe;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-resep');
    }
}