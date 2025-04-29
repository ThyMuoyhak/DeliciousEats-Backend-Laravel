<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['cat_name' => 'Electronics']);
        Category::create(['cat_name' => 'Clothing']);
        Category::create(['cat_name' => 'Books']);
    }
}