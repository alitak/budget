<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        $this->createCategories();
        $this->createSummaryCategories();
    }

    private function createCategories(): void
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
            'is_summary' => false,
        ]);

        $car = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Autó',
            'is_income' => false,
            'is_summary' => false,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $car->id,
            'name' => 'Autó',
            'is_income' => false,
            'is_summary' => false,
        ]);
    }

    private function createSummaryCategories()
    {
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Pénztárca',
            'is_income' => true,
            'is_summary' => true,
        ]);

        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Bankszámla',
            'is_income' => true,
            'is_summary' => true,
        ]);
    }
}
