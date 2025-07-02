<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Categories extends Component
{
    public $categories;

    public function __construct()
    {
        $this->categories = Category::all();
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard.categories');
    }
}
