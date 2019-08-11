<?php

use Illuminate\Database\Seeder;

class CategoryAdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CategoryAd::class, 20)->create();
    }
}
