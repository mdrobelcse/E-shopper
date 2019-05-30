<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([
            'div_id' => '1',
            'district_name' => 'Ramna',
            'slug' => 'ramna',
        ]);
    }
}
