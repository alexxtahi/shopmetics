<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tag 1
        DB::table('tags')->insert([
            'lib_tag' => "Pommade",
            'created_at' => now(),
        ]);

        // Tag 2
        DB::table('tags')->insert([
            'lib_tag' => "Crème",
            'created_at' => now(),
        ]);

        // Tag 3
        DB::table('tags')->insert([
            'lib_tag' => "Savon",
            'created_at' => now(),
        ]);

        // Tag 4
        DB::table('tags')->insert([
            'lib_tag' => "Thé",
            'created_at' => now(),
        ]);

        // Tag 5
        DB::table('tags')->insert([
            'lib_tag' => "Huile",
            'created_at' => now(),
        ]);
    }
}
