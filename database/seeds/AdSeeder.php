<?php

use App\Models\Ad;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ads = [
            [
                'title' => 'سيارة للبيع موديل تيوتا',
                'description' => 'سيارة بحالة ممتازة الرخصة سارية',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ],
            [
                'title' => 'موتوسيكل للبيع حالة جديدة',
                'description' => '',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'قطة شيرازى للبيع عمرها 6 شهور',
                'description' => 'فصيلة أصلية وتحتاج لرعاية',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'كنبة مستعملة للبيع',
                'description' => 'كنبة تستخدم للجلوس وتسطيع فردها للنوم',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'تلفاز مستعمل للبيع 32 بوصة',
                'description' => '',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'فستان سهرة أسود',
                'description' => '',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ],[
                'title' => 'سيارة للبيع موديل تيوتا',
                'description' => 'سيارة بحالة ممتازة الرخصة سارية',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ],
            [
                'title' => 'موتوسيكل للبيع حالة جديدة',
                'description' => '',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'قطة شيرازى للبيع عمرها 6 شهور',
                'description' => 'فصيلة أصلية وتحتاج لرعاية',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'كنبة مستعملة للبيع',
                'description' => 'كنبة تستخدم للجلوس وتسطيع فردها للنوم',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 8,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'تلفاز مستعمل للبيع 32 بوصة',
                'description' => '',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 2,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ], [
                'title' => 'فستان سهرة أسود',
                'description' => '',
                'image' => 'ad-demo/1.jpg',
                'published' => 1,
                'published_at' => now(),
                'category_id' => 1,
                'city_id' => 1,
                'type_is' => 'personal',
                'user_id' => 1
            ]
        ];
        foreach ($ads as $ad) {
            Ad::create($ad);
        }
    }
}
