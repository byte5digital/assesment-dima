<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // create some random skills
        for ($i=0; $i<10; $i++) {
            \App\Models\Skills::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
            ]);
        }
    }
}
