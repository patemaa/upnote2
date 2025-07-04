<div class="px-2 py-2 bg-yellow-300/50 text lg basis-6/12 rounded">
    <div class="max-w-xl mx-auto p-6 rounded-lg mt-6 text-gray-200">

        <form action="{{ isset($note) ? route('notes.update', $note) : route('notes.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block font-medium mb-1" for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ $note ? $note->title : '' }}"
                       class="w-full bg-yellow-400/40 text-white border border-yellow-500/40 rounded p-2 mb-2 focus:outline-none focus:ring focus:ring-yellow-700">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1" for="body">Body</label>
                <input type="text" name="body" id="body" value="{{ $note ? $note->body : '' }}"
                       class="w-full bg-yellow-400/40 text-white border border-yellow-500/40 rounded p-2 mb-2 focus:outline-none focus:ring focus:ring-yellow-700">
            </div>

            <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-medium px-4 py-2 rounded transition">
                Save
            </button>
        </form>
    </div>
</div>
