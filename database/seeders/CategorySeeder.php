<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['category_name' => 'Favoriler']);
        Category::create(['category_name' => 'İş Notları']);
        Category::create(['category_name' => 'Kişisel']);
    }
}
