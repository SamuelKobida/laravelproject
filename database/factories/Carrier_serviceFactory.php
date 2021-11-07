<?php

namespace Database\Factories;

use App\Models\Carrier_service;
use Illuminate\Database\Eloquent\Factories\Factory;

class Carrier_serviceFactory extends Factory
{
    protected $model = Carrier_service::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=>$this->faker->text(7),
            'code'=>$this->faker->text(5),
            'carrier_id'=>rand(1,5),
        ];
    }
}
