<?php

namespace Database\Seeders;


use App\Subjects\HowManyProducts;
use App\Subjects\IsCity;
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
            'name' => 'IsCity',
            'class' => (IsCity::class),
        ]);

        DB::table('subjects')->insert([
            'name' => 'HowManyProducts',
            'class' => (HowManyProducts::class),
        ]);
    }
}
