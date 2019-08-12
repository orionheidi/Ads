<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Product::class,100)->create()->each(function($product){
            $ad = App\Ad::inRandomOrder()->first();
            $product->ad_id = $ad->id;
            $product->save();
        });
    }
}
