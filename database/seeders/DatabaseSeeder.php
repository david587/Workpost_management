<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
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
        // \App\Models\User::factory(5)->create();
        $user =User::factory()->create([
            "name"=>"John Doe",
            "email"=>"john@gmail.com"
        ]);

        //when we create a listing we add the userid to the listing
        Listing::factory(6)->create([
            "user_id"=>$user->id
        ]);
    }
}
