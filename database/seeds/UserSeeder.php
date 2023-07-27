<?php

use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {   
        for($i=0; $i < 48; $i++){
            $newUser = new User;
            $newUser->name = "Marco";
            $newUser->lastname = "Marconi";
            $newUser->email = $faker->email;
            $newUser->address = $faker->address;
            $newUser->register_number_doc = $faker->numberBetween($min = 1000000000 , $max = mt_getrandmax());
            $newUser->profile_img = $faker->imageUrl($width = 500, $height = 500, 'cats');
            $newUser->phone_number = $faker->numberBetween($min = 2111111 , $max = 2999999);
            $newUser->prefix_id = "+39";
            $newUser->specializations = [array_rand(['Immunology', 'Naurology', 'Allergy', 'Dermatology', 'Radiology', 'Anesthesiology', 'Medical Genetics',  'Internal Medicine', 'Family Medicine', 'Nuclear Medicine', 'Obstetrics', 'Pathology', 'Surgery'])];
            $newUser->sponsorships = [array_rand(['standard', 'premium', 'exclusive'])];

        }
    }
}
