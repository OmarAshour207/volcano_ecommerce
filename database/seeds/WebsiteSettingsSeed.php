<?php

use Illuminate\Database\Seeder;

class WebsiteSettingsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filters = ['offers', 'products', 'limited_offers', 'categories', 'about', 'testimonials', 'services', 'blogs', 'subscribe_area'];
        \App\Models\WebsiteSetting::create([
            'page_filter'   => serialize($filters)
        ]);
    }
}
