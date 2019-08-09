<?php

use Illuminate\Database\Seeder;

class SubSubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subSubCategories = [
            [
           'name' => 'graphics card',
           'sub_category_id' => 1,
            ],
            [
           'name' => 'tables',
           'sub_category_id' => 2,  
            ],
            [
           'name' => 'chairs',
           'sub_category_id' => 2,  
            ],
            [
            'name' => 'sofa',
            'sub_category_id' => 3,  
            ],
            [
            'name' => 'bad',
            'sub_category_id' => 4,  
            ],
            [
            'name' => 'pants',
            'sub_category_id' => 5,  
            ],
            [
            'name' => 'shirts',
            'sub_category_id' => 5,  
            ],
            [
            'name' => 'dresses',
            'sub_category_id' => 6,  
            ],
            [
            'name' => 'skirts',
            'sub_category_id' => 6,  
            ],
            ];

       foreach ($subSubCategories as $subSubCategory) {
           App\SubSubCategory::create($subSubCategory);
       }
   }
    }
