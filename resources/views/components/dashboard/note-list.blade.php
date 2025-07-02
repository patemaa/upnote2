<div class="px-4 py-4 bg-orange-300/50 text lg basis-4/12 min-h-screen space-y-3 rounded">
    <h1>Notes</h1>
    <ul id="notes-list">
        @foreach($notes as $note)
            <li  data-id="{{ $note->id }}" class="px-1 py-1 block bg-orange-400/50 hover:bg-orange-500/50 rounded mb-2 cursor-pointer">
                {{ $note->title }}
            </li>
        @endforeach
    </ul>
</div>
