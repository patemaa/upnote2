<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $notes = Note::latest()->get();
        if ($request->has('selected')) {
            $selectedNoteId = Note::find($request->query('selected'))?->id;
        } else {
            $selectedNoteId = null;
        }

        return view('dashboard', [
            'notes' => $notes,
            'selectedNoteId' => $selectedNoteId,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'string|max:255',
        ]);

        $note = new Note();
        $note->title = $request->title;
        $note->body = $request->body;
        $note->user_id = auth()->id();
        $note->category_id = $request->category_id;
        $note->save();

        return redirect('dashboard');
    }

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'nullable|string',
        ]);

        $note->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return redirect()->route('dashboard');
    }


    public function destroy(Note $note)
    {
        $note->delete();

        return redirect('dashboard');
    }
}
