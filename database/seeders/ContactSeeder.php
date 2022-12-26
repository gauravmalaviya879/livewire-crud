<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\contacts;
use Faker\Factory as Faker;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=5;$i++){
            $faker = Faker::create();
            $contact = new contacts();
            $contact->phone = $faker->phoneNumber;
            $contact->name = $faker->name;
            
            $contact->save();
        }
    }
}
