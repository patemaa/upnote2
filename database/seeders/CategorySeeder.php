<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Favoriler']);
        Category::create(['name' => 'İş Notları']);
        Category::create(['name' => 'Kişisel']);
    }
}
