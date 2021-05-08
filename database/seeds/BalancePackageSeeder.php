<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BalancePackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('balance_packages')->insert([
            'title' => 'package 10 ad plus',
            'description' => 'publish 10 ads',
            'amount' => 10,
            'price' => 10.00,
            'active' => 1,
            'user_id' => 1
        ]);
        DB::table('balance_packages')->insert([
            'title' => 'package 20 ad plus',
            'description' => 'publish 20 ads',
            'amount' => 20,
            'price' => 19.00,
            'active' => 1,
            'user_id' => 1
        ]);
        DB::table('balance_packages')->insert([
            'title' => 'package 30 ad plus',
            'description' => 'publish 30 ads',
            'amount' => 30,
            'price' =>  27.00,
            'active' => 1,
            'user_id' => 1
        ]);
    }
}