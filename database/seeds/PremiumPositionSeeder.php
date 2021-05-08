<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PremiumPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('premium_positions')->insert(['category_deep' => '1', 'max_ads' => '8', 'user_id' => '1']);
        DB::table('premium_positions')->insert(['category_deep' => '2', 'max_ads' => '8', 'user_id' => '1']);
        DB::table('premium_positions')->insert(['category_deep' => '3', 'max_ads' => '8', 'user_id' => '1']);
        DB::table('premium_positions')->insert(['category_deep' => '4', 'max_ads' => '8', 'user_id' => '1']);
    }
}
