<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('divisions')->insert([
            'division_name' => 'Dhaka',
            'slug' => 'dhaka',
        ]);
    }
}
