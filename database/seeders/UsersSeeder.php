<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()
            ->create([
                'name' => 'alitak',
                'email' => 'kukel.attila@gmail.com',
                'password' => bcrypt('12345678'),
            ]);
    }
}
