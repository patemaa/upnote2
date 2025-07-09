<html xmlns:x-on="http://www.w3.org/1999/xhtml" xmlns:x-bind="http://www.w3.org/1999/xhtml">
<head>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-5 text-gray-800 bg-black/50 space-y-5">

<div class="flex min-h-[800px] max-w-[950px] space-x-3">
    <div class="px-5 py-5 bg-cyan-300/50 basis-3/12 rounded">
        <div x-data="categories()" class="space-y-4">
            <h1 class="text-lg font-semibold text-white">Categories</h1>

            <div class="flex space-x-2">
                <input class="border border-gray-300 bg-white text-gray-800 p-2 rounded h-10 flex-1 focus:outline-none focus:ring-2 focus:ring-cyan-400"
                       type="text" x-model="category" placeholder="Enter category..."/>
                <button class="w-10 h-10 rounded bg-cyan-600 text-white hover:bg-cyan-700 transition"
                        @click="add()">+
                </button>
            </div>

            <ul class="space-y-2">
                <template x-for="c, key in categories" :key="key">
                    <li @click="show(key)"
                        :class="selectedIndex === key ? 'bg-cyan-800/50 hover:bg-cyan-700/50 text-white' : ''"
                        class="flex items-center justify-between bg-cyan-100/50 border border-cyan-300/50 hover:bg-cyan-200/50 cursor-pointer text-gray-800 px-3 py-2 rounded shadow-sm">
                        <span x-text="c" class="font-medium truncate"></span>
                        <span @click="remove(key)" :class="selectedIndex === key ? 'text-white ml-2 hover:text-red-500 cursor-pointer' : 'ml-2 text-gray-500 hover:text-red-600 cursor-pointer'">
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25
                                      2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12
                                      .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5
                                      0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32
                                      0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                            </svg>
                        </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>

    <div class="px-5 py-5 bg-purple-300/50 basis-4/12 rounded">
        <div class="space-y-4" x-data="notes()" >
            <h1 class="text-lg font-semibold text-white">Notes</h1>
            <ul class="space-y-2">
                <template x-for="n, key in notes" :key="key">
                    <li @click="show(key)"
                        :class="selectedIndex === key ? 'bg-purple-800/50 hover:bg-purple-700/50 text-white' : ''"
                        class="flex items-center justify-between bg-purple-100/50 border border-purple-300/50 hover:bg-purple-200/50 cursor-pointer text-gray-800 px-3 py-2 rounded shadow-sm">
                        <span x-text="n.title" class="font-medium truncate"></span>
                        <span @click="remove(key)" :class="selectedIndex === key ? 'text-white ml-2 hover:text-red-500 cursor-pointer' : 'ml-2 text-gray-500 hover:text-red-600 cursor-pointer'" >
                            <svg xmlns="http://www.w3.org/2000/svg" class="size-5" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25
                                      2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12
                                      .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5
                                      0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32
                                      0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"/>
                            </svg>
                        </span>
                    </li>
                </template>
            </ul>
        </div>
    </div>

    <div x-data="editor()"  class="px-10 py-10 bg-pink-300/50 text-black dark:text-white basis-5/12 rounded">
        <form >
            <div class="mb-4">
                <label class="block font-medium mb-1" for="title">Title</label>
                <input type="text" name="title" id="title" value="" required x-model="title"
                       class="h-10 w-full bg-pink-100/50 text-black dark:text-white border border-pink-400/50 rounded p-2 mb-2 focus:outline-none focus:ring focus:ring-pink-500/50">
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1" for="body">Body</label>
                <input type="text" name="body" id="body" value="" required x-model="body"
                       class="h-10 w-full bg-pink-100/50 text-black dark:text-white border border-pink-400/50 rounded p-2 mb-2 focus:outline-none focus:ring focus:ring-pink-500/50">
            </div>

            <div class="mb-4" x-data="categories">
                <label for="category_id" class="block font-medium mb-1">Choose Category</label>
                <div class="flex items-center space-x-2">
                    <select name="category_id" id="category_id" x-model="category"
                            class="h-10 focus:outline-none focus:ring focus:ring-pink-500/50 border border-pink-400/50 bg-pink-100/50 text-black dark:text-white rounded p-2 w-full">
                        <option value=""></option>
                        <template x-for="(c, key) in categories" :key="key">
                            <option :value="c" x-text="c"></option>
                        </template>
                    </select>
                </div>
            </div>

            <button @click="save()" type="button"
                    class="bg-pink-600 hover:bg-pink-700 text-white font-medium px-4 py-2 rounded transition">
                Save
            </button>
        </form>
    </div>

</div>
</body>
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('note', {
            title: '',
            body: '',
            category: '',
        });
    });

    function categories() {
        return {
            selectedIndex: null,
            category: '',
            categories: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5', 'Category 6'],
            add: function () {
                this.categories.push(this.category);
            },
            remove: function (index) {
                this.categories.splice(index, 1);
            },
            show: function (index) {
                this.selectedIndex = index;
                console.log(this.categories[index]);
            }
        }
    }

    function notes() {
        return {
            selectedIndex: null,
            note: '',
            body: '',
            notes:[
                { title: 'Note 1', body: 'Body 1', category: 'Category 1' },
                { title: 'Note 2', body: 'Body 2', category: ''  },
                { title: 'Note 3', body: 'Body 3', category: ''  },
                { title: 'Note 4', body: 'Body 4', category: ''  },
                { title: 'Note 5', body: 'Body 5', category: ''  },
                { title: 'Note 6', body: 'Body 6', category: ''  },
            ],
            add: function () {
                this.notes.push({ title:'New Note', body:'New Body', category: 'New Category'});
            },
            remove: function (index) {
                this.notes.splice(index, 1);
            },
            show(index) {
                if (this.selectedIndex === index) {
                    this.selectedIndex = null;
                    Alpine.store('note').title = '';
                    Alpine.store('note').body = '';
                    Alpine.store('note').category = '';
                } else {
                    this.selectedIndex = index;
                    Alpine.store('note').title = this.notes[index].title;
                    Alpine.store('note').body = this.notes[index].body;
                    Alpine.store('note').category = this.notes[index].category;
                }
            }

        }
    }

    function editor() {
        return {
            get title() {
                return Alpine.store('note').title;
            },
            set title(val) {
                Alpine.store('note').title = val;
            },
            get body() {
                return Alpine.store('note').body;
            },
            set body(val) {
                Alpine.store('note').body = val;
            },
            get category() {
                return Alpine.store('note').category;
            },
            set category(val) {
                Alpine.store('note').category = val;
            },
            categories: ['Category 1', 'Category 2', 'Category 3', 'Category 4', 'Category 5', 'Category 6'],

            save() {
                const notesComp = Alpine.$data(document.querySelector('[x-data^="notes"]'));
                const index = notesComp.selectedIndex;
                if (index === null || index === undefined) {
                    notesComp.notes.push({
                        title: this.title || 'Untitled',
                        body: this.body || '',
                        category: this.category || ''
                    });
                    notesComp.selectedIndex = notesComp.notes.length - 1;
                    alert('New note created!');
                } else {
                    notesComp.notes[index] = {
                        title: this.title,
                        body: this.body,
                        category: this.category
                    };
                    alert('Note updated!');
                }
            }
        }
    }
</script>
</html>
