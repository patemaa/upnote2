<div class="px-4 py-4 bg-orange-300/50 text lg basis-4/12 min-h-screen space-y-3 rounded">
    <h1>Notes</h1>
    <ul id="notes-list">
        @foreach($notes as $note)
            @php
                $isSelected = request('selected') == $note->id;
                $url = $isSelected ? route('dashboard') : route('dashboard', ['selected' => $note->id]);
            @endphp
            <li class="group flex justify-between items-center bg-orange-400/50 hover:bg-orange-500/50 rounded mb-2 cursor-pointer {{ $isSelected ? 'bg-orange-700/50 hover:bg-orange-800/50' : '' }}">
                <a href="{{ $url }}" data-id="{{ $note->id }}" class="flex-1 px-2 py-1">
                    {{ $note->title }}
                </a>

                <form action="{{ route('notes.destroy', $note) }}" method="POST"
                      class="mr-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200 flex items-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white hover:text-red-500 focus:outline-none" aria-label="Delete note">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
