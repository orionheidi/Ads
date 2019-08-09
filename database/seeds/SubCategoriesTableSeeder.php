<?php

use Illuminate\Database\Seeder;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $subCategories = [
            [
           'name' => 'components',
           'category_id' => 1,
            ],
            [
           'name' => 'kitchens',
           'category_id' => 2,  
            ],
            [
           'name' => 'living rooms',
           'category_id' => 2,  
            ],
            [
            'name' => 'bedrooms',
            'category_id' => 2,  
            ],
            [
            'name' => 'man',
            'category_id' => 3,  
            ],
            [
            'name' => 'woman',
            'category_id' => 3,  
            ]
            ];

       foreach ($subCategories as $subCategory) {
           App\SubCategory::create($subCategory);
       }
   }
    }
