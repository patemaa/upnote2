<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Categories extends Component
{
    public $categories;
    public $selectedCategoryId;

    public function __construct($selectedCategoryId = null)
    {
        $this->categories = Category::all();
        $this->selectedCategoryId = $selectedCategoryId;
    }

    public function render(): View|Closure|string
    {
        return view('components.dashboard.categories');
    }
}
