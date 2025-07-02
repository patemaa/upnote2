<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
class NoteController extends Controller
{
    // Not ekleme
    public function store(Request $request)
    {
        $note = new Note();
        $note->title = $request->title;
        $note->body = $request->body;
        $note->user_id = auth()->id();
        $note->save();

        $note->categories()->sync($request->input('categories', []));
        return redirect('dashboard');
    }

    // Not update etme
    public function update()
    {

    }

    // Not Silme
    public function destroy()
    {

    }
}
