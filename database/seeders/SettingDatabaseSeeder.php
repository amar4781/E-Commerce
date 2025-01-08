<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
//        Setting::create([
//            'key' => 'my name',
//            'is_translated' => 0,
//            'plain_value' => 'amar yasser'
//        ]);
        Setting::setMany([
            'default_locale' => 'ar',
            'default_timezone' => 'Africa/Cairo',
            'reviews_enable' => true,
            'auto_approve_reviews' => true,
            'supported_currencies' => ['USD','EGP','SAR'],
            'default_currency' => 'USD',
            'store_email' => 'admin@ecommerce.test',
            'search_engine' => 'mysql',
            'locale_shipping_cost' => 0,
            'outer_shipping_cost' => 0,
            'free_shipping_cost' => 0,
            'translatable' => [
                'store_name' => 'Amar Store',
                'free_shipping_label' => 'Free Shipping',
                'local_shipping_label' => 'Local Shipping',
                'outer_shipping_label' => 'Outer Shipping',
            ],
        ]);
    }
}
