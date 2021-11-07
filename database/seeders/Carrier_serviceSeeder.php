<?php

namespace Database\Seeders;

use App\Models\Carrier_service;
use Illuminate\Database\Seeder;


class Carrier_serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carrier_service::factory()->times(5)->create();
    }
}
