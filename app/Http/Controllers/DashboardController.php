<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
}
