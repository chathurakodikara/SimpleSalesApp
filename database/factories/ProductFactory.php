<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $cost = $this->faker->numberBetween($min = 100, $max = 5000);
        return [
            'code' => $this->faker->randomNumber($nbDigits = 6, $strict = false),
            'name' => $this->faker->text($maxNbChars = 25),
            'unit' => $this->faker->randomElement($array = array ('nos','l','kg')),
            'mrp' => ($cost/100) * 110,
            'distributor_price' => $cost,
            'weight_volume' => $this->faker->numberBetween($min = 1, $max = 25),
            'user_id' => 1

        ];
    }
}
