<?php

namespace Database\Factories;

use App\Models\Eshop;
use Illuminate\Database\Eloquent\Factories\Factory;

class EshopFactory extends Factory
{
    protected $model = Eshop::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
    'name'=>$this->faker->text(7),
        ];
    }
}
