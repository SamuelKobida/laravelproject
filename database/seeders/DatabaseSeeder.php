<?php

namespace Database\Seeders;

use App\Models\Carrier;
use App\Models\Carrier_service;
use App\Models\Eshop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(EshopSeeder::class);
        $this->call(CarrierSeeder::class);
        $this->call(Carrier_serviceSeeder::class);
        $this->call(PredicateSeeder::class);
        $this->call(SubjectSeeder::class);
        $this->call(RulesSeeder::class);
    }
}
