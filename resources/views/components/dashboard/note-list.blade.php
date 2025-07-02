<div class="px-2 py-2 bg-orange-300/50 text lg basis-4/12 min-h-screen space-y-3 rounded">
    <h1>Notes</h1>
    <ul>
        @foreach($notes as $note)
            <li class="px-1 py-1 block bg-orange-400/50 hover:bg-orange-500/50 rounded mb-2 cursor-pointer">
                {{ $note->title }}
            </li>
        @endforeach
    </ul>
</div>
