<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PromotersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // fill in some fake promoters for testing purposes after cleaning table

        $faker = \Faker\Factory::create();

        $employees = DB::table('employees')
        ->select('id',)
        ->get();

        // create at least promoters from employees
        $promoterCount = rand(2, $employees->count());
        foreach($employees as $employee) {
            if ($promoterCount > 0) {
                \App\Models\Promoter::create([
                    'employee_id' => $employee->id,
                ]);
            }
            $promoterCount--;
        }

    }
}
