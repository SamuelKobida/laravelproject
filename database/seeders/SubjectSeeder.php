<?php

namespace Database\Seeders;

use App\Subjects\orderCity;
use App\Subjects\orderProducts;
use App\Subjects\orderSize;
use App\Subjects\orderWeight;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'orderCity',
            'class' => (orderCity::class),
        ]);

        DB::table('subjects')->insert([
            'name' => 'orderProducts',
            'class' => (orderProducts::class),
        ]);

        DB::table('subjects')->insert([
            'name' => 'orderSize',
            'class' => (OrderSize::class),
        ]);

        DB::table('subjects')->insert([
            'name' => 'orderWeight',
            'class' => (orderWeight::class),
        ]);

    }
}
