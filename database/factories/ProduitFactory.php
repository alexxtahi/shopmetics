<?php

namespace Database\Factories;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

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

        $filesInFolder = File::files(public_path() . '/fashi/img/products');
        $imgList = [];
        foreach ($filesInFolder as $path) {
            $file = pathinfo($path);
            $imgList[] = 'fashi/img/products/' . $file['basename'];
            //echo $file['basename'];
        }
        return [
            // ! Properties of fakes datas
            'code_prod' => $this->faker->numberBetween(1),
            'designation' => $this->faker->text(20),
            'description' => $this->faker->text(),
            'qte_prod' => $this->faker->numberBetween(1, 100),
            'img_prod' => Arr::random($imgList),
            'prix_prod' => 100, //$this->faker->numberBetween(1, 100),
            'ancien_prix' => $this->faker->numberBetween(1, 1000),
            'id_cat' => $this->faker->numberBetween(1, 5),
            'id_sous_cat' => $this->faker->numberBetween(1, 5),
            'en_promo' => array_rand([true, false]),
        ];
    }
}
