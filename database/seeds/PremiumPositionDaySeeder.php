<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PremiumPositionDaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('premium_position_days')->insert(['category_deep' => '1', 'days' => '1', 'days_cost' => '1.50', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '1', 'days' => '7', 'days_cost' => '10', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '1', 'days' => '14', 'days_cost' => '15', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '1', 'days' => '30', 'days_cost' => '30', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '2', 'days' => '1', 'days_cost' => '1', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '2', 'days' => '7', 'days_cost' => '5', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '2', 'days' => '14', 'days_cost' => '9', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '2', 'days' => '30', 'days_cost' => '21', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '3', 'days' => '1', 'days_cost' => '1', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '3', 'days' => '7', 'days_cost' => '5', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '3', 'days' => '14', 'days_cost' => '9', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '3', 'days' => '30', 'days_cost' => '21', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '4', 'days' => '1', 'days_cost' => '1', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '4', 'days' => '7', 'days_cost' => '5', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '4', 'days' => '14', 'days_cost' => '9', 'published' => '1', 'user_id' => '1']);
        DB::table('premium_position_days')->insert(['category_deep' => '4', 'days' => '30', 'days_cost' => '21', 'published' => '1', 'user_id' => '1']);
    }
}
