<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller
{
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
    public function show(Category $category)
    {
        $categories = Category::where('user_id', auth()->id())->get();
        $note = Note::where('user_id', auth()->id())
            ->where('category_id', $category->id)
            ->orderBy('updated_at')
            ->first();
        return view('dashboard', ['categories' => $categories, 'selectedCategory' => $category, 'note' => $note]);
    }
}
