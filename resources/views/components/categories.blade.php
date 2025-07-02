<div class="px-2 py-2 bg-red-300 text lg basis-3/12">
    <ul>
        @foreach($categories as $category)
            <li class="px-1 py-1 block bg-red-400 hover:bg-red-500 rounded mb-2"> {{ $category['name'] }}</li>
        @endforeach
    </ul>
</div>
