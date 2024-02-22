<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // fill in some fake employees for testing purposes after cleaning table
        #\App\Models\Employee::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            \App\Models\Employee::create([
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'group_id' => 1,
            ]);
        }
    }
}
