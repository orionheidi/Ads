<?php

use Illuminate\Database\Seeder;

class AdTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Ad::class,100)->create()->each(function($ad){
            $user = App\User::inRandomOrder()->first();
            $ad->user_id = $user->id;
            $ad->save();
        });
    }
}
