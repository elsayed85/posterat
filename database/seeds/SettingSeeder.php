<?php

use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $arr =[
            'site_title'=>'Posterat',
            'site_slogan'=>'For Ads',
            'site_description'=>'Sale And Buy On Internet',
            'year'=>'2021',
            'designedby'=> 'Posterat',
            'slider_limit'=>10,
            'pagination'=>5,
            'ads_home_limit'=>36,
            'ads_category_limit'=>18,
            'premium_ad_mark'=>true, //in home page
            'related_ads_limit'=>2, //single ad page
            'preloader'=>false,
            'more_ads'=>false,
            'pre_phone'=>'+965',
            'breadcrumb'=> true,
            'map'=> true,
            'sticky_ad_detail'=> false,
            'ad_advice'=>false,
            'last_ads_category'=>false,
            'special_ads_category'=>false,
            'popular_categories'=>false,
            'ad_points'=>3,
            'like_points'=>1,
            'tawk_to_chat'=>0,
            'usual_balance'=>5,
            'usual_expired_at'=>30,//days
            'paid_expired_at'=>30,//days
            'payment_mode'=>'live',
            'theme_switcher'=>false,
            'theme_select'=>'default',
            'pages_top_menu'=>0,
            'slider_height'=> 48,
            'ad_image_height'=> 15,
            'home_per_row'=> 4,
            'create_ad_step1_ar'=>'نشر الإعلان بدون مقابل! ومع ذلك ، على جميع الإعلانات متابعة قواعدنا:',
            'create_ad_step1_en'=>'Post an ad for free! However, all advertisements must follow our rules:',
            'create_ad_step2_ar'=>'نشر الإعلان بدون مقابل! ومع ذلك ، على جميع الإعلانات متابعة قواعدنا:',
            'create_ad_step2_en'=>'Post an ad for free! However, all advertisements must follow our rules:',
            'facebook_link'=>'#',
            'twitter_link'=>'#',
            'instagram_link'=>'#',
            'linkedin_link'=>'#',
            'youtube_link'=>'#',
            'tiktok_link'=>'#',
            ];
        foreach ($arr as $name => $var)
            DB::table('settings')->insert([
                'name' => $name,
                'var' => $var ,
                'group' => 'Main',
                'user_id' => 1,
                'created_at' => now()
            ]);

    }
}
