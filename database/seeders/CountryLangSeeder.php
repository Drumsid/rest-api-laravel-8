<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountryLangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 100) as $index){
            DB::table('country_lang')->insert([
                'alias' => Str::random(2),
                'name' => Str::random(7),
                'name_en' => Str::random(10) . "_en",
            ]);
        }

    }
}
