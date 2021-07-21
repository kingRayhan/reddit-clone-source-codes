<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

//        Thread::factory(300)->create();


        User::factory(10)->hasThreads(20)->create();

//        User::factory(5)->create()->each(function($user){
//            Thread::factory(10)->create(['user_id' => $user->id]);
//        });
    }
}
