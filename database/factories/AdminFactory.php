<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // ! Properties of fakes datas
            'nom_admin' => $this->faker->name(),
            'prenom_admin' => $this->faker->lastName(),
            'contact_admin' => $this->faker->phoneNumber(),
            'email_admin' => $this->faker->unique()->safeEmail(),
        ];
    }
}
