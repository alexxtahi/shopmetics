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
        // ! Generate fakes datas
        $this->call(UserSeeder::class);
        \App\Models\Admin::factory(1)->create();
        \App\Models\Categorie::factory(5)->create();
        \App\Models\SousCategorie::factory(5)->create();
        \App\Models\Client::factory(10)->create();
        $this->call(MoyenPaiementSeeder::class);
        \App\Models\Produit::factory(50)->create();
    }
}
