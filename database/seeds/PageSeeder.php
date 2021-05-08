<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        $title_en= ['About Us','Contact Us','Privacy Policy','Terms'];
        $title_ar= ['من نحن','اتصل بنا','سياسة الخصوصية','الشروط والأحكام'];
        $file_ar = ['about-us_ar.txt','contact-us_ar.txt','privacy-policy_ar.txt','terms_ar.txt'];
        $file_en = ['about-us_en.txt','contact-us_en.txt','privacy-policy_en.txt','terms_en.txt'];
           for($i=0; $i < count($title_en); $i++){
            DB::table('pages')->insert([
                'type_is' => 'page',
                'url' => '#',
                'title_ar' => $title_ar[$i],
                'title_en' => $title_en[$i],
                'body_ar' => file_get_contents(database_path() . '/seeds/content/pages/'.$file_ar[$i]),
                'body_en' =>file_get_contents(database_path() . '/seeds/content/pages/'.$file_en[$i]),
                'published' => 1,
                'user_id' => 1
            ]);
            }
        DB::table('pages')->insert([
            'type_is' => 'link',
            'url' => 'https://blog.posterat.com',
            'title_ar' => 'المدونة',
            'title_en' => 'blog',
            'published' => 1,
            'user_id' => 1
        ]);
        DB::table('pages')->insert([
            'type_is' => 'popup',
            'url' => '#',
            'title_ar' => 'إعلن مجاناً',
            'title_en' => 'Post Free Ad',
            'body_ar' => 'whatsapp_icon:4466446545_ phone_icon:4466446545_',
            'body_en' => 'whatsapp_icon:4466446545_ phone_icon:4466446545_',
            'published' => 1,
            'user_id' => 1
        ]);
    }
}
