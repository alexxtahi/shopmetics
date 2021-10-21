<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create default users
        $this->call(UserSeeder::class);
        // ! Generate fakes datas
        \App\Models\Categorie::factory(5)->create();
        \App\Models\SousCategorie::factory(5)->create();
        //\App\Models\Client::factory(10)->create();
        $this->call(MoyenPaiementSeeder::class);
        \App\Models\Produit::factory(50)->create();
        $this->call(TagSeeder::class);
    }
}
