<?php

namespace Database\Seeders;

use App\Predicates\IsEqual;
use App\Predicates\Less;
use App\Predicates\More;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PredicateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('predicates')->insert([
            'name' => 'Equal',
            'class' => (Equal::class),
        ]);

        DB::table('predicates')->insert([
            'name' => 'Less',
            'class' => (Less::class),
        ]);

        DB::table('predicates')->insert([
            'name' => 'More',
            'class' => (More::class),
        ]);
    }
}
