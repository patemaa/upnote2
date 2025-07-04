<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Note;
use Illuminate\Support\Facades\Request;

class CategoryController extends Controller
{
    // kategori ekleme
    public function store(Request $request)
    {
        $request->validate(['name' => 'required|string|max:255']);

        $category =  new Category();
        $category->name = $request->name;
        $category->user_id = auth()->id();

        return redirect('dashboard');
    }
    // kategori silme
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
