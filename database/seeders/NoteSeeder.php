<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Note::create(['title' => 'Note 1', 'body' => 'Body 1', 'user_id' => 1]);
        Note::create(['title' => 'Note 2', 'body' => 'Body 2', 'user_id' => 1]);
        Note::create(['title' => 'Note 3', 'body' => 'Body 3', 'user_id' => 1]);
    }
}
