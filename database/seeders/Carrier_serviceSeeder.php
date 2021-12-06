<?php

namespace Database\Seeders;

use App\Models\Carrier_service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class Carrier_serviceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '1',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '2',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '4',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '5',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '6',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '6',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '7',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '7',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '7',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '8',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '9',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '9',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '10',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '11',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '11',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '12',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '13',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '13',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '13',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '14',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '14',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '14',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '15',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '15',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Dvojhodinovy interval',
            'code' => 'interval',
            'carrier_id' => '15',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '15',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '16',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Nad 50 kg',
            'code' => 'above50',
            'carrier_id' => '16',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Zaklad',
            'code' => 'basic',
            'carrier_id' => '17',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('carrier_services')->insert([
            'name' => 'Do 24 hodin',
            'code' => '24',
            'carrier_id' => '17',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
