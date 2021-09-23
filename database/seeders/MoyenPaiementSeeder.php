<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MoyenPaiementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moyen_paiements')->insert(
            [
                [
                    'lib_moyen_paiement' => 'VISA',
                ],
                [
                    'lib_moyen_paiement' => 'Master Card',
                ],
                [
                    'lib_moyen_paiement' => 'Cash',
                ],
                [
                    'lib_moyen_paiement' => 'Orange Money',
                ],
                [
                    'lib_moyen_paiement' => 'MTN Mobile Money',
                ],
                [
                    'lib_moyen_paiement' => 'Flooz',
                ],
                [
                    'lib_moyen_paiement' => 'Wave',
                ],
            ]
        );
    }
}
