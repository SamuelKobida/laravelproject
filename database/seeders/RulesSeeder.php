<?php

namespace Database\Seeders;

use App\Models\Rule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class RulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rules')->insert([
            'name' => 'Bratislava default',
            'value' => 'Bratislava',
            'priority' => '100',
            'carrier_service_id' => '1',
            'eshop_id' => '1',
            'subject_id' => '1',
            'predicate_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);

        DB::table('rules')->insert([
            'name' => 'Alza Premium Weight',
            'value' => '50',
            'priority' => '10',
            'carrier_service_id' => '26',
            'eshop_id' => '1',
            'subject_id' => '4',
            'predicate_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);

    }
}
