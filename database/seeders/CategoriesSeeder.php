<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $living = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Lakhatás',
            'is_income' => false,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $living->id,
            'name' => 'Lakáshitel',
            'is_income' => false,
        ]);

        $car = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Autó',
            'is_income' => false,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $car->id,
            'name' => 'Autó',
            'is_income' => false,
        ]);

    }
}
