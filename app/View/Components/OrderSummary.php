<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class OrderSummary extends Component
{
    public $carts;

    public function __construct($carts = null)
    {
        $this->carts = $carts;
    }

    public function render(): View|Closure|string
    {
        return view('components.order-summary');
    }
}
