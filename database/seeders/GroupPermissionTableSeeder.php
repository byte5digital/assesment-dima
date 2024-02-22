<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $skills = DB::table('skills')
        ->select('id')
        ->where('id','=',1)
        ->get()
        ->count();

        // create one connection between permission 1 and group 1
        if ($skills === 0) {
            \App\Models\GroupPermission::create([
                'group_id' => 1,
                'permission_id' => 1,
            ]);    
        }
    }
}
