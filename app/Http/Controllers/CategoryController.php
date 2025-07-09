<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('dashboard');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('dashboard');
    }
}
