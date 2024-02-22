<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PromoterSkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // connect some skills to promoters

        $faker = \Faker\Factory::create();

        $skills = DB::table('skills')
        ->select('id')
        ->get();

        $promoters = DB::table('promoters')
        ->select('id')
        ->get();

        foreach($promoters as $promoter) {
            foreach($skills as $skill) {
                if (rand(0,3) === 0) {
                    continue; // random (75%) to get the skill
                }

                \App\Models\PromoterSkill::create([
                    'promoter_id' => $promoter->id,
                    'skill_id' => $skill->id,
                ]);
            }
            
        }
    }
}
