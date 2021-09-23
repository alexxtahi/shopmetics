<?php

namespace Database\Factories;

use App\Models\SousCategorie;
use Illuminate\Database\Eloquent\Factories\Factory;

class SousCategorieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SousCategorie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // ! Properties of fakes datas
            'lib_sous_cat' => $this->faker->text(50),
            'id_cat' => $this->faker->numberBetween(1, 5),
        ];
    }
}
