<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageHeader extends Component
{
    public $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.page-header');
    }
}
