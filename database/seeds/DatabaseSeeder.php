<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoriesTableSeeder::class);
        $this->call(SubCategoriesTableSeeder::class);
        $this->call(SubSubCategoriesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AdTableSeeder::class);
        $this->call(RoleUserTableSeeder ::class);
        $this->call(CategoryAdsTableSeeder::class);
        $this->call(ProductTableSeeder::class);

        
    }
}
