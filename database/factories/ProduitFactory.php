<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProduitFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produit::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // ! Properties of fakes datas
            'code_prod' => $this->faker->numberBetween(1),
            'designation' => $this->faker->text(20),
            'description' => $this->faker->text(),
            'qte_prod' => $this->faker->numberBetween(1, 100),
            'prix_prod' => $this->faker->numberBetween(1, 100000),
            'ancien_prix' => $this->faker->numberBetween(1, 100000),
            'id_cat' => $this->faker->numberBetween(1, 5),
            'id_sous_cat' => $this->faker->numberBetween(1, 5),
            'en_promo' => array_rand([true, false]),
        ];
    }
}
