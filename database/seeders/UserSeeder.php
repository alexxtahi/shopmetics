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
        // Admin
        DB::table('users')->insert([
            'name' => "Admin",
            'login' => "Admin",
            'password' => bcrypt('password'),
            'role' => 'Admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
        ]);

        // Client 1
        DB::table('users')->insert([
            'name' => "Client",
            'login' => "Client",
            'password' => bcrypt('password'),
            'role' => 'Client',
            'email' => 'client@client.com',
            'email_verified_at' => now(),
        ]);
    }
}
