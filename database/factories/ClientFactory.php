<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // ! Properties of fakes datas
            /*'nom_client' => $this->faker->name(),
            'prenom_client' => $this->faker->lastName(),
            'contact_client' => $this->faker->phoneNumber(),
            'email_client' => $this->faker->unique()->safeEmail(),*/
            'ville' => $this->faker->country(),
            'commune' => $this->faker->city(),
        ];
    }
}
