<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Concepteur 1
        DB::table('users')->insert([
            'nom' => "TAHI",
            'prenom' => "Alexandre",
            'password' => bcrypt('#Xcoders2021'),
            'role' => 'Concepteur',
            'email' => 'alexandretahi7@gmail.com',
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);

        // Concepteur 2
        DB::table('users')->insert([
            'nom' => "TANOH",
            'prenom' => "Olivier",
            'password' => bcrypt('#Xcoders2021'),
            'role' => 'Concepteur',
            'email' => 'bouadoutanoh9@gmail.com',
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);

        // Default Admin
        DB::table('users')->insert([
            'nom' => "Admin",
            'prenom' => "Admin",
            'password' => bcrypt('Admin'),
            'role' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'created_at' => now(),
        ]);
    }
}
