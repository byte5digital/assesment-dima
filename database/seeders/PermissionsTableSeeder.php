<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // create some random permissions
        \App\Models\Permissions::create([
            'name' => $faker->word(),
            'description' => $faker->sentence(),
        ]);
    }
}
