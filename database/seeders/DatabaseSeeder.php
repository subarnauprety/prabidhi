<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
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
        \App\Models\User::factory(1)->create();
        SiteSetting::create([
            'logo' => "asd",
            "map" => "asd",
            "email" => "asd",
            "phone_number" => "asd",
            "address" => "asd",
            "facebook" => "asd",
            "twitter" => "asd",
            "linkdin" => "asd",
            "instagram" => "asd",
            "status" => "asd",
        ]);
    }
}
