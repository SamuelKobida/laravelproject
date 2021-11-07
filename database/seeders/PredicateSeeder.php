<?php

namespace Database\Seeders;

use App\Predicates\IsEqual;
use App\Predicates\LessProducts;
use App\Predicates\MoreProducts;
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
            'name' => 'IsEqual',
            'class' => (IsEqual::class),
        ]);

        DB::table('predicates')->insert([
            'name' => 'LessProducts',
            'class' => (LessProducts::class),
        ]);

        DB::table('predicates')->insert([
            'name' => 'MoreProducts',
            'class' => (MoreProducts::class),
        ]);
    }
}
