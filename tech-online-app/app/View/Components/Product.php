<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use PhpParser\Node\Expr\Cast\Double;

class Product extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public int $id,
        public string $name,
        public float $price,
        public string $description,
        public float $sale,
        public string $category,
        public string $imagelink = '',
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('components.product');
    }
}
