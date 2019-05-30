<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paymentmethods')->insert([
            'payment_name' => 'Bkash',
            'slug' => 'bkash',
            'account_type' => 'Personal',
            'number' => '01736887255',
            'description' => 'Please send the above money to this Rocket No and write your transaction code below there',
        ]);

        DB::table('paymentmethods')->insert([
            'payment_name' => 'Rocket',
            'slug' => 'rocket',
            'account_type' => 'Personal',
            'number' => '01636887265',
            'description' => 'Please send the above money to this Rocket No and write your transaction code below there',
        ]);
    }
}
