<?php

namespace App\View\Components;

use App\Models\Note;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NoteList extends Component
{
    public $notes;
    public function __construct()
    {
        $this->notes = Note::all();
    }
    public function render(): View|Closure|string
    {
        return view('components.dashboard.note-list');
    }
}
