<div class="px-4 py-4 bg-red-300/50 text lg basis-3/12 space-y-3 rounded">
    <h1>Categories</h1>
    <ul id="categories-list">
        @foreach($categories as $category)
            <li  data-id="{{ $category->id }}" class="px-1 py-1 block bg-red-400/50 hover:bg-red-500/50 rounded mb-2 cursor-pointer">
                {{ $category['name'] }}
            </li>
        @endforeach
    </ul>
</div>
