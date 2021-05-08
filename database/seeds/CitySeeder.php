<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        $title_ar = ['محافظة العاصمة','محافظة الجهراء','محافظة الفروانية','محافظة حولي','محافظة مبارك الكبير','محافظة الأحمدي'];
        $title_en = ['Capital Governorate','Jahra Governorate','Farwaniya Governorate','Hawalli Governorate','Mubarak Al-Kabeer Governorate','Ahmadi Governorate'];

        while($i <= count($title_ar)-1) {
            DB::table('cities')->insert([
                'name_ar' => $title_ar[$i],
                'name_en' => $title_en[$i],
                'published' => 1,
                'user_id' => 1
            ]);
            $i++;
        }
    }
}
