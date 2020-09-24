<?php

use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\About::create([
            'title'  => 'About Us',
            'description'    => 'About Us Desc in en',
        ]);
    }
}
