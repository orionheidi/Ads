<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    {      
        factory(App\RoleUser::class, 20)->create();
   
    }
}
}