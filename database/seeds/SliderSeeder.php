<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=1;
        while($i <= 10) {
            DB::table('sliders')->insert([
                'title_ar' => \Illuminate\Support\Str::random(16),
                'title_en' => \Illuminate\Support\Str::random(16),
                'description_ar' => \Illuminate\Support\Str::random(100).'whatsapp_icon:4466446545_ phone_icon:4466446545_',
                'description_en' => \Illuminate\Support\Str::random(100).'whatsapp_icon:4466446545_ phone_icon:4466446545_',
                'url' => '#',
                'slider_image' =>'slider-demo/'.$i.'-600x300.jpg',
                'order_is' => $i,
                'published' => 1,
                'user_id' => 1
            ]);
       $i++;
        }
    }
}
