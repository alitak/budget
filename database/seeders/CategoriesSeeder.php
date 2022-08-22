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
        //region living
        $living = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Lakhatás',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $living->id,
            'name' => 'lakáshitel',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $living->id,
            'name' => 'közművek',
            'is_income' => false,
            'is_summary' => false,
            'position' => 20,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $living->id,
            'name' => 'TV, internet',
            'is_income' => false,
            'is_summary' => false,
            'position' => 30,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $living->id,
            'name' => 'egyéb',
            'is_income' => false,
            'is_summary' => false,
            'position' => 40,
        ]);
        //endregion

        //region personal
        $personal = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Személyes kiadások',
            'is_income' => false,
            'is_summary' => false,
            'position' => 20,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $personal->id,
            'name' => 'orvos',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $personal->id,
            'name' => 'gyógyszertár',
            'is_income' => false,
            'is_summary' => false,
            'position' => 20,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $personal->id,
            'name' => 'drogéria',
            'is_income' => false,
            'is_summary' => false,
            'position' => 30,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $personal->id,
            'name' => 'szolgáltatások',
            'is_income' => false,
            'is_summary' => false,
            'position' => 40,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $personal->id,
            'name' => 'ruha',
            'is_income' => false,
            'is_summary' => false,
            'position' => 50,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $personal->id,
            'name' => 'egyéb',
            'is_income' => false,
            'is_summary' => false,
            'position' => 60,
        ]);
        //endregion

        //region car
        $car = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Autó',
            'is_income' => false,
            'is_summary' => false,
            'position' => 30,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $car->id,
            'name' => 'Autó',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        //endregion

        //region insurance
        $insurance = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Biztosítások',
            'is_income' => false,
            'is_summary' => false,
            'position' => 40,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $insurance->id,
            'name' => 'kockázati életbiztosítás',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        //endregion

        //region children
        $children = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Gyerekek',
            'is_income' => false,
            'is_summary' => false,
            'position' => 50,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $children->id,
            'name' => 'ruha',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $children->id,
            'name' => 'orvos',
            'is_income' => false,
            'is_summary' => false,
            'position' => 20,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $children->id,
            'name' => 'pelenka',
            'is_income' => false,
            'is_summary' => false,
            'position' => 30,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $children->id,
            'name' => 'játék',
            'is_income' => false,
            'is_summary' => false,
            'position' => 40,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $children->id,
            'name' => 'óvoda',
            'is_income' => false,
            'is_summary' => false,
            'position' => 50,
        ]);
        //endregion

        //region periodical
        $periodical = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Időszakos kiadások',
            'is_income' => false,
            'is_summary' => false,
            'position' => 60,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $periodical->id,
            'name' => 'bank',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $periodical->id,
            'name' => 'telefon',
            'is_income' => false,
            'is_summary' => false,
            'position' => 20,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $periodical->id,
            'name' => 'anyagköltség',
            'is_income' => false,
            'is_summary' => false,
            'position' => 30,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $periodical->id,
            'name' => 'egyéb',
            'is_income' => false,
            'is_summary' => false,
            'position' => 40,
        ]);
        //endregion

        //region food
        $food = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Étel',
            'is_income' => false,
            'is_summary' => false,
            'position' => 70,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $food->id,
            'name' => 'ebéd',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $food->id,
            'name' => 'bevásárlás',
            'is_income' => false,
            'is_summary' => false,
            'position' => 20,
        ]);
        //endregion

        //region savings
        $savings = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Megtakarítások',
            'is_income' => false,
            'is_summary' => false,
            'position' => 80,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $savings->id,
            'name' => 'részvények',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        //endregion

        //region pets
        $pets = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Háziállatok',
            'is_income' => false,
            'is_summary' => false,
            'position' => 90,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $pets->id,
            'name' => 'háziállatok',
            'is_income' => false,
            'is_summary' => false,
            'position' => 10,
        ]);
        //endregion

        //region incomes
        $income = Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Bevételek',
            'is_income' => true,
            'is_summary' => false,
            'position' => 100,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $income->id,
            'name' => 'Ati',
            'is_income' => true,
            'is_summary' => false,
            'position' => 10,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $income->id,
            'name' => 'Brigi',
            'is_income' => true,
            'is_summary' => false,
            'position' => 20,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $income->id,
            'name' => 'támogatás',
            'is_income' => true,
            'is_summary' => false,
            'position' => 30,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => $income->id,
            'name' => 'egyéb',
            'is_income' => true,
            'is_summary' => false,
            'position' => 40,
        ]);
        //endregion
    }

    private function createSummaryCategories()
    {
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Pénztárca Ati',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Pénztárca Brigi',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Széf',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Bankszámla Ati',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Bankszámla Brigi',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Revolut',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Mkb ep',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Állampapír',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Babakötvény Nóra',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Babakötvény Maja',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'LTP',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'KBC',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Kripto',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Euro',
            'is_income' => true,
            'is_summary' => true,
            'position' => 0,
        ]);

        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Babaváró',
            'is_income' => false,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Imi',
            'is_income' => false,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Unicredit',
            'is_income' => false,
            'is_summary' => true,
            'position' => 0,
        ]);
        Category::query()->firstOrCreate([
            'parent_id' => null,
            'name' => 'Támogatott',
            'is_income' => false,
            'is_summary' => true,
            'position' => 0,
        ]);
    }
}
