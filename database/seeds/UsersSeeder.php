<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Admin',
            'last_name' => 'Posterat',
            'email' => 'admin@posterat.com',
            'password' => Hash::make('admin@posterat.com'),
            'phone' => '12345678',
            'bio' => Str::random(10),
            'admin'=>1,
            'email_verified_at' => now(),
        ]);

        DB::table('users')->insert([
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
            'email' => 'user@posterat.com',
            'password' => Hash::make('user@posterat.com'),
            'phone' => '23456789',
            'bio' => Str::random(10),
            'email_verified_at' => now(),
        ]);
    }
}
