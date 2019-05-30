<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' => 'MD.Admin',
            'email' => 'admin@blog.com',
            'phone' => '01736997101',
            'division_id' => 1,
            'district_id' => 1,
            'password' => bcrypt('rootadmin'),
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'MD.User',
            'email' => 'user@blog.com',
            'phone' => '01736997102',
            'division_id' => 1,
            'district_id' => 1,
            'password' => bcrypt('rootuser'),
        ]);
    }
}
