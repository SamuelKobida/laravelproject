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
            'priority' => '1',
            'carrier_service_id' => '1',
            'eshop_id' => '1',
            'subject_id' => '1',
            'predicate_id' => '1',
            'parentrule_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);

        DB::table('rules')->insert([
            'name' => 'Bratislava Weight+',
            'value' => '50',
            'priority' => '10',
            'carrier_service_id' => '26',
            'eshop_id' => '1',
            'subject_id' => '4',
            'predicate_id' => '3',
            'parentrule_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);

        DB::table('rules')->insert([
            'name' => 'Bratislava Weight-',
            'value' => '10',
            'priority' => '10',
            'carrier_service_id' => '31',
            'eshop_id' => '1',
            'subject_id' => '4',
            'predicate_id' => '2',
            'parentrule_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);
        DB::table('rules')->insert([
            'name' => 'Bratislava Products+',
            'value' => '15',
            'priority' => '9',
            'carrier_service_id' => '30',
            'eshop_id' => '1',
            'subject_id' => '2',
            'predicate_id' => '3',
            'parentrule_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);

        DB::table('rules')->insert([
            'name' => 'Bratislava default',
            'value' => 'Bratislava',
            'priority' => '1',
            'carrier_service_id' => '30',
            'eshop_id' => '2',
            'subject_id' => '1',
            'predicate_id' => '1',
            'parentrule_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);

        DB::table('rules')->insert([
            'name' => 'Nitra default',
            'value' => 'Nitra',
            'priority' => '1',
            'carrier_service_id' => '25',
            'eshop_id' => '1',
            'subject_id' => '1',
            'predicate_id' => '1',
            'parentrule_id' => null,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'isActive' => '1'
        ]);

    }
}
