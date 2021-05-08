<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(PageSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(AdSeeder::class);
        $this->call(PremiumPositionDaySeeder::class);
        $this->call(PremiumPositionSeeder::class);
        $this->call(BalancePackageSeeder::class);

    }
}
