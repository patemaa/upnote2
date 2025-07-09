<div
    x-show="showModal"
    x-transition
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    style="display: none"
    @click.away="showModal = false"
>
    <div class="bg-white rounded p-6 w-96 max-w-full shadow-lg" @click.stop>
        <button @click="showModal = false" class="float-right text-gray-600 hover:text-gray-900 text-2xl">&times;</button>

        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <label for="category_name" class="text-black">Create Category</label>
            <input name="category_name" type="text" placeholder="New category name" required
                   class="w-full border rounded p-2 mb-4 text-black">

            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-medium px-4 py-2 rounded w-full">
                Save
            </button>
        </form>
    </div>
</div>
