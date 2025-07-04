<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $notes = Note::latest()->get();
        $selectedNoteId = $request->query('selectedNote');
        $selectedCategoryId = $request->query('selectedCategory');
        $categories= Category::all();

        return view('dashboard', [
            'notes' => $notes,
            'selectedNoteId' => $selectedNoteId,
            'categories' => $categories,
            'selectedCategoryId' => $selectedCategoryId
        ]);
    }
}
