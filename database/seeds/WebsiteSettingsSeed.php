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
        $filters = ['about', 'contacts','our_services', 'testimonials', 'latest_blog'];
        \App\Models\WebsiteSetting::create([
            'page_filter'   => serialize($filters)
        ]);
    }
}
