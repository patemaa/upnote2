<?php

namespace App\View\Components;

use App\Models\Note;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Editor extends Component
{
    /**
     * Create a new component instance.
     */
    public $note;

    public function __construct($selectedNoteId = null)
    {
        $this->note = $selectedNoteId ? Note::find($selectedNoteId) : null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.editor');
    }
}
