<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $notes = Note::latest()->get();
        if ($request->has('selectedNote')) {
            $selectedNoteId = Note::find($request->query('selected'))?->id;
        } else {
            $selectedNoteId = null;
        }
        $categories = Category::all();

        return view('dashboard', [
            'notes' => $notes,
            'selectedNoteId' => $selectedNoteId,
            'categories' => $categories,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->body = $request->body;
        $note->category_id = $request->category_id;
        $note->user_id = auth()->id();
        $note->save();

        return redirect()->route('dashboard');
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $note->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category_id,
        ]);

        return redirect()->back();
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('dashboard');
    }
}
