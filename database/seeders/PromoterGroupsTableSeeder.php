<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromoterGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        // create some random promoter groups
        for ($i=0; $i<5; $i++) {
            \App\Models\PromoterGroups::create([
                'name' => $faker->word(),
                'description' => $faker->sentence(),
            ]);
        }
    }
}
