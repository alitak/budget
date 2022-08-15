<?php

namespace Database\Seeders;

use App\Models\Category;
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
            'name' => 'Pénztárca Ati',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Pénztárca Brigi',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Széf',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Bankszámla Ati',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Bankszámla Brigi',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Revolut',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Mkb ep',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Állampapír',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Babakötvény Nóra',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Babakötvény Maja',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'LTP',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'KBC',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Kripto',
            'is_income' => true,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Euro',
            'is_income' => true,
            'is_summary' => true,
        ]);

        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Babaváró',
            'is_income' => false,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Imi',
            'is_income' => false,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Unicredit',
            'is_income' => false,
            'is_summary' => true,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Támogatott',
            'is_income' => false,
            'is_summary' => true,
        ]);
    }
}
