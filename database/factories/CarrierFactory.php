<?php

namespace Database\Factories;

use App\Models\Carrier;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarrierFactory extends Factory
{
    protected $model = Carrier::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(7),
            'eshop_id'=>rand(1,5),
        ];
    }
}
