<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(5)->create();

        

        Listing::create([
            "title"=> "loremadjasdlkdajak",
            "tags"=> "lak",
            "company"=> "dajak",
            "email"=> "loremadjasd@gmail.com",
            "website"=> "www.acme.com",
            "description"=> "Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Numquam dolorem autem molestias ex fugiat, obcaecati quas nobis voluptas in distinctio!"
        ]);

        Listing::create([
            "title"=>"loremsdsddaysa",
            "tags"=>"laksaf",
            "company"=>"dajsssfdk",
            "email"=>"loremadjasssd@gmail.com",
            "website"=>"www.acme.com",
            "description"=>"Lorm ipsum dolor sit amet con molestias ex fugiat, obcaecati quas nobis voluptas in distinctio!"
        ]);
    }
}
