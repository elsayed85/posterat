<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
$categories = [
    [
        'title_ar' => 'الصفحة الرئيسية',
        'title_en' => 'Home Page',
        'description_ar' => '',
        'description_en' => '',
        'parent' => NULL,
        'published' => 1,
        'deep' => 1,
        'is_menu'=>0,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ],[
        'title_ar' => 'المركبات',
        'title_en' => 'Vehicles',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ],
    [
        'title_ar' => 'العقارات',
        'title_en' => 'Real estate',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ], [
        'title_ar' => 'الطعام والتجهيزات الغذائية',
        'title_en' => 'Food and catering',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ], [
        'title_ar' => 'الأثاث',
        'title_en' => 'Furniture',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ], [
        'title_ar' => 'الالكترونيات',
        'title_en' => 'Electronics',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ], [
        'title_ar' => 'الأزياء والموضة',
        'title_en' => 'Fashion and fashion',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ], [
        'title_ar' => 'الوظائف',
        'title_en' => 'Jobs',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ], [
        'title_ar' => 'الحيوانات',
        'title_en' => 'Animals',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 1,
        'published' => 1,
        'deep' => 2,
        'is_menu'=>1,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
    ]
    ];
        $children = [[
        'title_ar' => 'السيارات المركبات',
        'title_en' => 'Cars vehicles',
        'description_ar' => '',
        'description_en' => '',
        'parent' => 2,
        'published' => 1,
        'deep' => 3,
        'is_menu'=>0,
        'premium_ads_is'=>1,
        'premium_ads_num'=>5,
        'order_is' => $i++,
        'user_id' => 1
        ]];
        foreach ($categories as $category) {
            Category::create($category);
        }
        foreach ($children as $child) {
            Category::create($child);
        }
    }
}
